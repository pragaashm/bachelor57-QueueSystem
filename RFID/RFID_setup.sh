#!/bin/bash
sudo apt update
sudo apt upgrade -y
sudo apt install python3-dev python3-pip -y
sudo pip3 install spidev
sudo pip3 install mfrc522
sudo cp read.py /usr/bin
sudo cp read.service /lib/systemd/system
sudo systemctl enable read.service
