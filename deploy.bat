rsync -e "ssh -ax -c blowfish" -vrtazP --exclude-from="config/rsync_exclude.txt" . sjoerd@www.weett.nl:/www/symfony-bangalore/qaeet
ssh sjoerd@www.weett.nl '/www/symfony-bangalore/qaeet/symfony cc'