import json 
import glob


for i in glob.glob('public/problem_sets/*.json'):
    with open(i) as x: f = x.read()
    print(json.load(f))