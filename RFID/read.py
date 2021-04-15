import RPi.GPIO as GPIO
import keyboard

from mfrc522 import SimpleMFRC522
from time import sleep


GPIO.setwarnings(False)    
reader = SimpleMFRC522()

rfid_Y = True;

while rfid_Y:
        try:
            
            
            id, text = reader.read()
            keyboard.send('ctrl')
            keyboard.write(str(id))
            keyboard.send('enter')

            sleep(5)

        except:
                GPIO.cleanup()
