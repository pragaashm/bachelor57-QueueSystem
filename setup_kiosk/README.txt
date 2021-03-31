For å sette opp raspberry pi i kiosk-modus kan du enten bruke img-filen eller setup-filen som følger med.
Hver av disse metodene er beskrevet under. Metoden som bruker img-filen er lettere og tar mindre tid.
Metoden som bruker setup-filen krever at du har tilgang til et tastatur som du kan kople til enheten med, eller
at du er kjent med å kjøre raspberry pi "headless".


Bruksanvisning ved bruk av img-fil:
	1) Last inn img-fil på micro-SD-kort, og sett dette i raspberry pi.
	2) Bruk SSH til å kople på ved en av de IP-adressene som du får oppgitt fra raspberry pi ved oppstart.
		Brukernavn: pi, Passord: raspberry
		Eksempel på SSH-påkobling: "ssh pi@192.168.10.110" i command prompt (windows) eller i terminal (linux)
	3) Naviger til "/etc/xdg/openbox/" og åpne tekstfilen "environment". Set variabelen KIOSK_URL til den URL/IP-adresse som du vil at
	   enheten skal åpne etter oppstart. Lagre og lukk filen.
	4) Skriv inn kommandoen "sudo raspi-config" i terminalen/command prompt. Gå til "Performance -> overlay file system" og skru denne funksjonen på.
	   Sett boot partition til read-only når du får spørsmål om dette. Lagre og lukk innstillinger ved å trykke på TAB to ganger og deretter ENTER.
	5) Skriv kommandoen "sudo reboot" for å starte systemet på nytt. Nå skal enheten starte opp med den nettsiden du har valgt, og den skal være i read-only-modus.


Bruksanvisning ved bruk av setup-fil:
	1) Flash et minnekort med raspberry pi OS lite
	2) Mens kortet enda er påkoblet datamaskinen, kopier setup over i 
	   "/home/pi" på raspberry pi-en
	3) Kople fra minnekortet, og sett det i Raspberry Pi
	4) Start Raspberry Pi
	5) Logg inn ved brukernavn "pi" og passord "raspberry"
	6) Skriv kommandoen: "sudo bash setup"
	7) Vent til setup er ferdig (kan ta rundt 5 minutter) 
	8) Slå på SSH i "sudo raspi-config".
		Husk å sjekk IP adressen til enheten før du restarter dersom du skal
		bruke SSH!
		Dette kan gjøres ved kommandoen "ip address".
	9) Slå på automatisk innlogging i "sudo raspi-config".
	10) Endre hvilke URL/IP-adresse du vil at enheten skal koble seg til ved oppstart:
		Endre variabelen "KIOSK_URL" i tekstfila "/etc/xdg/openbox/environment".
		Husk å gjøre dette FØR du setter enheten i read-only ved hjelp av overlayFS
	11) Slå på overlayFS i "sudo rapi-config" for å gjøre systemet read-only.
	12) Restart ved å bruke kommandoen "sudo reboot".

Hva setup gjør:
1) oppdaterer system
2) installerer nødvendig GUI (Xserver, openbox)
3) installerer chromium nettleser
4) gjør at chromium kjører i kioskmodus ved innlogging ved valgt URL


Dette er problemer vi bør finne ut av:
1) Hvilke flagg som kan skrue av funksjonen for å sveipe til høyre for å gå til    forige side.
2) Hvordan kan vi gjøre det enklere for systemadmin å komme seg inn på enhetene?	a) En 'primær' DNS-server slik at hver enhet får et eget navn, f.eks 
           bordnummer.
	b) Statiske IP-adresser som korresponderer med bordnummer.
	c) En mulighet for admin å lese ut IP-adressen direkte fra enheten
	   under drift. (Kan være vanskelig)
3) Skal vi slå av wifi og bluetooth? Dette kan gjøres ved å bruke kommandoen rfkill.
