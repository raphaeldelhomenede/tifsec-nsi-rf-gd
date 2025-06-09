def compte_occurrences(x, tab):
    nb_occurrences = 0
    for i in tab:
        if i == x:
            nb_occurrences += 1
    return nb_occurrences

print(compte_occurrences(5, []))
print(compte_occurrences(5, [-2, 3, 1, 5, 3, 7, 4]))
print(compte_occurrences('a', ['a','b','c','a','d','e','a']))
