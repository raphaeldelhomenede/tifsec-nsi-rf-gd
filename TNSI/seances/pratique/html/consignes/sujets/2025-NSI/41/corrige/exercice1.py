def ou_exclusif(tab0, tab1):
    if len(tab0) != len(tab1):
        return False

    tab = []
    for i in range(len(tab0)):
        if tab0[i] == tab1[i]:
            tab.append(0)
        else:
            tab.append(1)
    return tab

print(ou_exclusif([1, 0, 1, 0, 1, 1, 0, 1], [0, 1, 1, 1, 0, 1, 0, 0]))
print(ou_exclusif([1, 1, 0, 1], [0, 0, 1, 1]))
