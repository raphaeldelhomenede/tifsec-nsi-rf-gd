def correspond(mot, mot_a_trous):
    tab1 = []
    if len(mot) == len(mot_a_trous):
        for i in range(len(mot)):
            if mot[i] == mot_a_trous[i] or mot_a_trous[i] == "*":
                tab1.append(True)
            else:
                tab1.append(False)
    else:
        tab1.append(False)
    if False in tab1:
        return False
    else:
        return True

print(correspond('INFORMATIQUE', 'INFO*MA*IQUE'))
print(correspond('AUTOMATIQUE', 'INFO*MA*IQUE'))
print(correspond('STOP', 'S*'))
print(correspond('AUTO', '*UT*'))
print(correspond("toto", "tit*"))
