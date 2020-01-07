import json
from numpy import array
with open('json-file') as data_file:    
 data = json.load(data_file)
 cs=data['clockspeed']
 rm=data['ram']
 str=data['storage']
 pr=data['price']
 total=array([cs,rm,str,pr])
 print(total)
 