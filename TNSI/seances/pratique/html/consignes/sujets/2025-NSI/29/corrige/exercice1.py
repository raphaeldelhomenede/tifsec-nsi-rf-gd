def selection_enclos(animaux, num_enclos):
    tab0 = []
    for i in animaux:
        if i['enclos'] == num_enclos:
            tab0.append(i)
    return tab0

animaux = [ {'nom':'Medor', 'espece':'chien', 'age':5, 'enclos':2},
{'nom':'Titine', 'espece':'chat', 'age':2, 'enclos':5},
{'nom':'Tom', 'espece':'chat', 'age':7, 'enclos':4},
{'nom':'Belle', 'espece':'chien', 'age':6, 'enclos':3},
{'nom':'Mirza', 'espece':'chat', 'age':6, 'enclos':5}]
print(selection_enclos(animaux, 5))
print(selection_enclos(animaux, 2))
print(selection_enclos(animaux, 7))
