def max_dico(dico):
    users = []
    nb_likes = []
    for i, j in dico.items():
        users.append(i)
        nb_likes.append(j)

    indice_maxi = 0
    maxi = nb_likes[0]
    for i in range(len(nb_likes)):
        if maxi < nb_likes[i]:
            maxi = nb_likes[i]
            indice_maxi = i
    return users[indice_maxi], maxi

print(max_dico({ 'Bob': 102, 'Ada': 201, 'Alice': 103, 'Tim': 50 }))
print(max_dico({ 'Alan': 222, 'Ada': 201, 'Eve': 222, 'Tim': 50 }))
