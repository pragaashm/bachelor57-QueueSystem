#!/bin/bash
sudo pip3 
sudo apt update -y
sudo apt upgrade -y
sudo apt install python3-dev python3-pip
sudo pip3 install mfrc522
sudo pip3 install spidev
sudo pip3 install keyboard
sudo cp read.py /usr/bin
sudo cp read.service /lib/systemd/system
sudo systemctl daemon-reload
sudo systemctl enable read.service
sudo systemctl start read.service
