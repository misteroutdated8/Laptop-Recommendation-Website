from numpy import exp, dot, array, random
import pandas as pd
import json
import numpy as np
import pickle

def writeToJSONFile(path, fileName, data):
	filePathNameWExt = './' + path + '/' + fileName
	with open(filePathNameWExt, 'w') as fp:
		json.dump(data, fp)
		
def sigmoid(x):
	return 1 / (1 + exp( -x ))
		
def think(inputs):
	return sigmoid(dot( inputs, synaptic_weights ) )

with open('json-file') as data_file:
	data=json.load(data_file)
	cs=float(data['clockspeed'])
	rm=float(data['ram'])
	Str=float(data['storage'])
	pr=float(data['price'])
	total=array([cs,rm,Str,pr])
		
    #print(total)
		

    
#make prediction for new data
synaptic_weights = random.random((4, 1))

f = open('weight.pickle', 'rb')
synaptic_weights = pickle.load(f)

prediction = think( total ) 
pr=np.squeeze(np.asarray(prediction))
pr1=pr.tolist()
#return json.dump(pr1)


path='./'
fileName='example.json'
data={}
data['test1']=pr1

writeToJSONFile(path, fileName, data)