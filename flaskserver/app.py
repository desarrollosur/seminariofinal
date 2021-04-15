from flask import Flask, jsonify, request
import pickle
import json
import pyBKT
import pandas as pd

Pkl_Filename = 'Pickle_RL_Model.pkl'
with open(Pkl_Filename, 'rb') as file:
    Pickled_LR_Model = pickle.load(file)


app = Flask(__name__)

@app.route('/predict', methods=['POST'])
def predict():
    datos = request.json
    dataframe = pd.DataFrame.from_dict(datos)
    pred2 = Pickled_LR_Model.predict(data=dataframe)
    #solamente me interesa el último valor de la lista con la predicción
    return pred2["correct_predictions"].tail(1).to_json(orient="records")


    
