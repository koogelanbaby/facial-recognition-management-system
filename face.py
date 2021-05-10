import cv2
import numpy as np
import face_recognition
import os
import mysql.connector
import cgi
from datetime import datetime
# from PIL import ImageGrab
# !C:/Python/Python39
#print("content-Type:text/html")
#print()
#
database = mysql.connector.connect(
    host = "localhost",
    user = "root",
    password = "",
    database = "university_of_greenwich"
)

cursor = database.cursor()

path = 'C:/xampp/htdocs/fyp/AI'
images = []
classNames = []
myList = os.listdir(path)
print(myList)
for cl in myList:
    curImg = cv2.imread(f'{path}/{cl}')
    images.append(curImg)
    classNames.append(os.path.splitext(cl)[0])
print(classNames)

def findEncodings(images):
    encodeList = []
    for img in images:
        img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
        encode = face_recognition.face_encodings(img)[0]
        encodeList.append(encode)
    return encodeList


def checkAttendance(name):
    with open('Attendance.csv','r+') as f:
        myRecord = f.readlines()
        namelist = []
        for line in myRecord:
            entry = line.split(',')
            namelist.append(entry[0])
        if name not in namelist:
            now = datetime.now()
            datestring = now.strftime('%Y-%m-%d %H:%M:%S')
            f.writelines(f'\n{name},{datestring}')
            insertAttendanceQuery = "INSERT INTO `attendance` (`name`, `time`) VALUES (%s, %s)"
            attendanceValues = (name, datestring)
            cursor.execute(insertAttendanceQuery, attendanceValues)
            database.commit()
        if cursor.rowcount == 1:
            print("Data has successfully added into database")
            
#cur = mydb.cursor()        
#cur.execute("INSERT INTO attendance values (%s,%s)",(name,datestring))
#mydb.commit()


encodeListKnown = findEncodings(images)
print('Encoding Complete')

cap = cv2.VideoCapture(0)

while True:
    success, img = cap.read()
    #img = captureScreen()
    imgS = cv2.resize(img,(0,0),None,0.25,0.25)
    imgS = cv2.cvtColor(imgS, cv2.COLOR_BGR2RGB)
    
    facesCurFrame = face_recognition.face_locations(imgS)
    encodesCurFrame = face_recognition.face_encodings(imgS,facesCurFrame)
    
    for encodeFace,faceLoc in zip(encodesCurFrame,facesCurFrame):
        matches = face_recognition.compare_faces(encodeListKnown,encodeFace)
        faceDis = face_recognition.face_distance(encodeListKnown,encodeFace)
#        print(faceDis)
        matchIndex = np.argmin(faceDis)
        
        
        if matches[matchIndex]:
            name = classNames[matchIndex].upper()
            
            y1,x2,y2,x1 = faceLoc
            y1, x2, y2, x1 = y1*4,x2*4,y2*4,x1*4
            cv2.rectangle(img,(x1,y1),(x2,y2),(0,255,0),2)
            cv2.rectangle(img,(x1,y2-35),(x2,y2),(0,255,0),cv2.FILLED)
            cv2.putText(img,name,(x1+6,y2-6),cv2.FONT_HERSHEY_COMPLEX,1,(255,255,255),2)
            checkAttendance(name)

    cv2.imshow('Webcam',img)
    cv2.waitKey(1)

#cur.close()
#mydb.close()
 
