#Importt libraries being used
import cv2
import time


fitToEllipse = False
#For using video instead of camera uncomment code below
capture = cv2.VideoCapture('vid.mp4')

#Get access to camera of device
#capture = cv2.VideoCapture(0)
time.sleep(2)

#Apply gaussian background segmentation
gaussian_segmentation = cv2.createBackgroundSubtractorMOG2()
count = 0

while(1):
    #Get the frames
    available, frame = capture.read()
    
    #Convert each frame to gray scale and subtract the background
    try:
        gray_scale = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
        fgmask = gaussian_segmentation.apply(gray_scale)
        
        #Find the contours
        contours, _ = cv2.findContours(fgmask, cv2.RETR_TREE, cv2.CHAIN_APPROX_SIMPLE)

        if contours:
        
            # List to hold all areas
            contour_areas = []
            
            
            for contour in contours:
                ar = cv2.contourArea(contour)
                contour_areas.append(ar)
            
            max_area = max(contour_areas, default = 0)
            max_area_index = contour_areas.index(max_area)
            
            cont = contours[max_area_index]
            
            #Get dimensions of the object
            x, y, width, height = cv2.boundingRect(cont)

            cv2.drawContours(fgmask, [cont], 0, (255,255,255), 3, maxLevel = 0)
            
            #if contour height is lower than width
            if height < width:
                count += 1
            
            #Fall might have occured so draw red rectangle and display on screen 'fall detected'
            if count > 10:
                cv2.rectangle(frame,(x,y),(x+width,y+height),(0,0,255),2)

            #No fall so draw green rectangle
            if height > width:
                count = 0 
                cv2.rectangle(frame,(x,y),(x+width,y+height),(0,255,0),2)

            
            #Show the video capture
            cv2.imshow('video', frame)
            
            #End if x key is pressed
            if cv2.waitKey(33) == ord('x'):
             break
    except Exception as e:
        break
#End the program
cv2.destroyAllWindows()