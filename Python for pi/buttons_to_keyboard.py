import keyboard
from gpiozero import Button
from time import sleep

delay_after_buttonpress = 0.5

left_button = Button(17)
right_button = Button(27)
up_button = Button(22)
down_button = Button(5)
confirm_button = Button(6)

#event loop
while True:
    if left_button.is_pressed:
        keyboard.send("left")
        sleep(delay_after_buttonpress)

    elif right_button.is_pressed:
        keyboard.send("right")
        sleep(delay_after_buttonpress)

    elif up_button.is_pressed:
        keyboard.send("up")
        sleep(delay_after_buttonpress)

    elif down_button.is_pressed:
        keyboard.send("down")
        sleep(delay_after_buttonpress)

    elif confirm_button.is_pressed:
        keyboard.send("ctrl")
        sleep(delay_after_buttonpress)



