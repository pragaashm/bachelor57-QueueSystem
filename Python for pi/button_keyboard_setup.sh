sudo apt install python3-pip -y
sudo pip3 install keyboard
sudo pip3 install gpiozero
sudo cp buttons_to_keyboard.service /etc/systemd/system/
sudo cp buttons_to_keyboard.py /usr/bin
sudo systemctl enable buttons_to_keyboard.service
