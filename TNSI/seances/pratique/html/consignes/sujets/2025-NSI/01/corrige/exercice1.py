def voisins_entrants(adj, x):
    voisins = []
    for i in range(len(adj)):
        if x in adj[i]:
            voisins.append(i)
    return voisins

# Exemples d'utilisation
print(voisins_entrants([[1, 2], [2], [0], [0]], 0))  # [2, 3]
print(voisins_entrants([[1, 2], [2], [0], [0]], 1))  # [0]
