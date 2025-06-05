def voisins_entrants(adj, x):
    tab = []
    attemps = 0
    for i in adj:
        if x in i:
            tab.append(attemps)
        attemps += 1
    return tab

adj = [[1, 2], [2], [0], [0]]
print(voisins_entrants([[1, 2], [2], [0], [0]], 0))
print(voisins_entrants([[1, 2], [2], [0], [0]], 1))
