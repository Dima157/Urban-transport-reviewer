import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import json
import base64
import sys



PLOT_LABEL_FONT_SIZE = 14
def getColors(n):
    COLORS = []
    cm = plt.cm.get_cmap('hsv', n)
    for i in np.arange(n):
        COLORS.append(cm(i))
    return COLORS

def dict_sort(my_dict):
    keys = []
    values = []
    my_dict = sorted(my_dict.items(), key=lambda x:x[1], reverse=True)
    for k, v in my_dict:
        keys.append(k)
        values.append(v)
    return (keys,values)


def build_graphic():
    f = plt.figure()
    df = pd.read_csv('C:/Program Files/OSPanel/domains/Urban-transport-reviewer/storage/app/review.csv', escapechar='`', low_memory=False)

    df = df.replace({'shape': None}, 'unknown')


    country_label_count = pd.value_counts(
        df['Carrier'].values)

    country_count = pd.value_counts(df['Carrier'].values, sort=True)
    country_count_keys, country_count_values = dict_sort(dict(country_count))
    TOP_COUNTRY = len(country_count_keys)
    plt.title('Reviews for all time', fontsize=PLOT_LABEL_FONT_SIZE)
    plt.bar(np.arange(TOP_COUNTRY), country_count_values, color=getColors(TOP_COUNTRY))
    plt.xticks(np.arange(TOP_COUNTRY), country_count_keys, rotation=90, fontsize=10)
    plt.yticks(fontsize=PLOT_LABEL_FONT_SIZE)
    plt.ylabel('Count reviews', fontsize=PLOT_LABEL_FONT_SIZE)
    f.savefig("C:/Program Files/OSPanel/domains/Urban-transport-reviewer/public/graphics/all.pdf", bbox_inches='tight')

def build_graphic_date(dateStart, dateEnd):
    f = plt.figure()
    df = pd.read_csv("C:/Program Files/OSPanel/domains/Urban-transport-reviewer/storage/app/review.csv", escapechar='`', low_memory=False)
    mask = (df['Date'] > dateStart) & (df['Date'] <= dateEnd)

    country_label_count = pd.value_counts(df.loc[mask]['Carrier'].values)
    country_count = pd.value_counts(df.loc[mask]['Carrier'].values, sort=True)
    country_count_keys, country_count_values = dict_sort(dict(country_count))
    TOP_COUNTRY = len(country_count_keys)
    plt.title('Reviews from ' + str(dateStart) + ' to ' + str(dateEnd), fontsize=PLOT_LABEL_FONT_SIZE)
    plt.bar(np.arange(TOP_COUNTRY), country_count_values, color=getColors(TOP_COUNTRY))
    plt.xticks(np.arange(TOP_COUNTRY), country_count_keys, rotation=90, fontsize=10)
    plt.yticks(fontsize=PLOT_LABEL_FONT_SIZE)
    plt.ylabel('Count reviews', fontsize=PLOT_LABEL_FONT_SIZE)
    f.savefig("C:/Program Files/OSPanel/domains/Urban-transport-reviewer/public/graphics/date.pdf", bbox_inches='tight')
data = json.loads(base64.b64decode(sys.argv[1]))
if data['type'] == 'date':
    build_graphic_date(data['dateStart'], data['dateEnd'])
else:
    build_graphic()
