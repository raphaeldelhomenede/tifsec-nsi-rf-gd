def voisins_entrants(adj, x):
    voisins = []
    for i in range(len(adj)):
        if x in adj[i]:
            voisins.append(i)
    return voisins
