from flask import Flask, jsonify, request
import pickle
import json
import pyBKT
import pandas as pd

Pkl_Filename = 'Pickle_RL_Model.pkl'
with open(Pkl_Filename, 'rb') as file:
    Pickled_LR_Model = pickle.load(file)

datosdict = {'Unnamed: 0': {775: 84058, 777: 84061, 786: 84114, 787: 84116},
 'Row': {775: 112156, 777: 112159, 786: 112212, 787: 112214},
 'Anon Student Id': {775: '0I891Gg',
  777: '0I891Gg',
  786: '0I891Gg',
  787: '0I891Gg'},
 'Problem Hierarchy': {775: 'Unit RATIONAL-IRRATIONAL-NUMBERS, Section RATIONAL-IRRATIONAL-NUMBERS-1',
  777: 'Unit RATIONAL-IRRATIONAL-NUMBERS, Section RATIONAL-IRRATIONAL-NUMBERS-1',
  786: 'Unit RATIONAL-IRRATIONAL-NUMBERS, Section RATIONAL-IRRATIONAL-NUMBERS-1',
  787: 'Unit RATIONAL-IRRATIONAL-NUMBERS, Section RATIONAL-IRRATIONAL-NUMBERS-1'},
 'Problem Name': {775: 'RATIONAL1-104',
  777: 'RATIONAL1-180',
  786: 'RATIONAL1-155',
  787: 'RATIONAL1-046'},
 'Problem View': {775: 1, 777: 1, 786: 1, 787: 1},
 'Step Name': {775: 'RationalNumberline1',
  777: 'RationalNumberline1',
  786: 'RationalNumberline1',
  787: 'RationalNumberline1'},
 'Step Start Time': {775: '2006-09-07 09:16:53.0',
  777: '2006-09-07 09:18:29.0',
  786: '2006-09-14 08:49:06.0',
  787: '2006-09-14 08:49:53.0'},
 'First Transaction Time': {775: '2006-09-07 09:17:33.0',
  777: '2006-09-07 09:18:44.0',
  786: '2006-09-14 08:49:18.0',
  787: '2006-09-14 08:50:02.0'},
 'Correct Transaction Time': {775: '2006-09-07 09:17:35.0',
  777: '2006-09-07 09:18:44.0',
  786: '2006-09-14 08:49:31.0',
  787: '2006-09-14 08:50:02.0'},
 'Step End Time': {775: '2006-09-07 09:17:35.0',
  777: '2006-09-07 09:18:44.0',
  786: '2006-09-14 08:49:31.0',
  787: '2006-09-14 08:50:02.0'},
 'Step Duration (sec)': {775: 42.0, 777: 15.0, 786: 25.0, 787: 9.0},
 'Correct Step Duration (sec)': {775: 0, 777: 15.0, 786: 0, 787: 9.0},
 'Error Step Duration (sec)': {775: 42.0, 777: 0, 786: 25.0, 787: 0},
 'Correct First Attempt': {775: 0, 777: 1, 786: 0, 787: 1},
 'Incorrects': {775: 1, 777: 0, 786: 2, 787: 0},
 'Hints': {775: 0, 777: 0, 786: 0, 787: 0},
 'Corrects': {775: 1, 777: 1, 786: 1, 787: 1},
 'KC(Default)': {775: 'Plot terminating proper fraction',
  777: 'Plot terminating proper fraction',
  786: 'Plot terminating proper fraction',
  787: 'Plot terminating proper fraction'},
 'Opportunity(Default)': {775: 1, 777: 2, 786: 3, 787: 4}}


df = pd.DataFrame.from_dict(datosdict)
pred = Pickled_LR_Model.predict(data=df)

app = Flask(__name__)

@app.route('/predict', methods=['POST'])
def predict():
    datos = request.json
    dataframe = pd.DataFrame.from_dict(datos)
    pred2 = Pickled_LR_Model.predict(data=dataframe)
    return pred2.to_html()


@app.route('/')
def hello_world():
    return pred.to_html()
    
