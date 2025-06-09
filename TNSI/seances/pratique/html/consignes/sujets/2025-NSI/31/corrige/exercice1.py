def recherche_motif(motif, texte):
    indices = 0
    tab = []
    for i in range(len(texte)-(len(motif)-1)):
        if motif in texte[i:i+len(motif)]:
            tab.append(indices)
        indices += 1
    return tab

print(recherche_motif("ab", ""))
print(recherche_motif("ab", "cdcdcdcd"))
print(recherche_motif("ab", "abracadabra"))
print(recherche_motif("ab", "abracadabraab"))
