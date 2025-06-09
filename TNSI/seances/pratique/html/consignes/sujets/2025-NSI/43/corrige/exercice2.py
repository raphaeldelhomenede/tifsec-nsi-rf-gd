def colore_comp1(M, i, j, val):
    if M[i][j] != 1:
        return

    M[i][j] = val

    if i-1 >= 0: # propage en haut
        colore_comp1(M, i-1, j, val)
    if i+1 < len(M): # propage en bas
        colore_comp1(M, i+1, j, val)
    if j-1 >= 0: # propage à gauche
        colore_comp1(M, i, j-1, val)
    if j+1 < len(M[i]): # propage à droite
        colore_comp1(M, i, j+1, val)
    return M

print(colore_comp1([[0, 0, 1, 0], [0, 1, 0, 1], [1, 1, 1, 0], [0, 1, 1, 0]], 2, 1, 3))
