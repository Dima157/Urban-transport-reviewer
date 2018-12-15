import cv2
import numpy as np
import sys
import glob
import math
import time
import os
import json
import base64

def contourCandidate(contour, allowable_area):
    rect = cv2.minAreaRect(contour)
    square = getSquare(rect[1][0], rect[1][1])
    if square > 0:
        if ((square > allowable_area[0]) and (square < allowable_area[1])):
            return True
    return False

def getSquare(w, h):
    if(w > 0 and h > 0):
        return w * h
    return 0

def prepareImage(img):
    img = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    img = cv2.GaussianBlur(img, (5, 5), 0)
    img = cv2.Sobel(img, -1, 1, 0)
    h, sobel = cv2.threshold(img, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)
    strElement = cv2.getStructuringElement(cv2.MORPH_RECT, (17, 4))
    return cv2.morphologyEx(sobel, cv2.MORPH_CLOSE, strElement)

def getWhitePixelsInContour(contour):
    white_pixels = 0
    for x in range(contour.shape[0]):
        for y in range(contour.shape[1]):
            if contour[x][y] == 255:
                white_pixels += 1
    return white_pixels

def getPixelsSquare(box, imgWithFilter):
    allX = [i[0] for i in box]
    allY = [i[1] for i in box]
    center = ((min(allX) + max(allX)) / 2, (min(allY) + max(allY)) / 2)
    size = (max(allX) - min(allX), max(allY) - min(allY))
    return cv2.getRectSubPix(imgWithFilter, size, center)

def plateDetected(name):
    image = cv2.imread(name)
    originalImage = np.copy(image)
    imgWithFilters = prepareImage(originalImage)
    copyImageFilter = np.copy(imgWithFilters)
    contours = cv2.findContours(imgWithFilters, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_NONE)[1]
    for contour in contours:
        if contourCandidate(contour, (300, 20000)):
            rect = cv2.minAreaRect(contour)
            box = cv2.boxPoints(rect)
            box = np.int0(box)
            pixelSquare = getPixelsSquare(box, copyImageFilter)
            countWhitePixels = getWhitePixelsInContour(pixelSquare)
            whitePercent = float(countWhitePixels) / (pixelSquare.shape[0] * pixelSquare.shape[1])
            if whitePercent > 0.5:
                print(json.dumps("b"))
                cropped = originalImage[box[2][1]:box[0][1], box[0][0]:box[2][0]]
                cv2.imwrite("C:/Program Files/OSPanel/domains/Urban-transport-reviewer/public/cars/crops/cropped.jpg", cropped)
                cv2.waitKey(0)
            cv2.waitKey(0)
    return originalImage

data = json.loads(base64.b64decode(sys.argv[1]))
path = str(data['img']['img'])
print(path)
real_path = 'C:/Program Files/OSPanel/domains/Urban-transport-reviewer/public/cars/' + path
plateDetected(real_path)


