import random
def lancer(n):
    tab = []
    for _ in range(n):
        tab.append(random.randint(1, 6))
    return tab

def paire_6(tab):
    nombre_de_6 = 0
    for i in tab:
        if i == 6:
            nombre_de_6 += 1

    if nombre_de_6 >= 2:
        return True
    else:
        return False

lancer1 = lancer(5)
print(lancer1)
print(paire_6(lancer1))

lancer2 = lancer(5)
print(lancer2)
print(paire_6(lancer2))

lancer3 = lancer(3)
print(lancer3)
print(paire_6(lancer3))

lancer4 = lancer(0)
print(lancer4)
print(paire_6(lancer4))
