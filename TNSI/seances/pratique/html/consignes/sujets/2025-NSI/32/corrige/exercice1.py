def occurrences(caractere, chaine):
    nb_occurences = 0
    for i in chaine:
        if i == caractere:
            nb_occurences += 1
    return nb_occurences

print(occurrences('e', "sciences"))
print(occurrences('i',"mississippi"))
print(occurrences('a',"mississippi"))
