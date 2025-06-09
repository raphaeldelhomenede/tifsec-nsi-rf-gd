def recherche_motif(motif, texte):
    indices = 0
    tab = []
    for i in range(len(texte)-1):
        if motif in texte[i:i+2]:
            tab.append(indices)
        indices += 1
    return tab

print(recherche_motif("ab", ""))
print(recherche_motif("ab", "cdcdcdcd"))
print(recherche_motif("ab", "abracadabra"))
print(recherche_motif("ab", "abracadabraab"))
