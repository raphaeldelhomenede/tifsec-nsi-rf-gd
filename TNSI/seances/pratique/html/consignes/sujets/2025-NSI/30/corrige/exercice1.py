def delta(liste):
    tab = []
    for i in range(len(liste)):
        if i == 0:
            tab.append(liste[i])
        else:
            tab.append(-(liste[i-1] - liste[i]))
    return tab

print(delta([1000, 800, 802, 1000, 1003]))
print(delta([42]))
