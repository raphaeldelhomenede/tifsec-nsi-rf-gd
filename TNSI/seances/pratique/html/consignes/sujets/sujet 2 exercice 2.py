""" Les consignes sont sur https://tifsec-nsi.rf.gd/TNSI/?session=Sujet2Exercice2 """
def codes_parfait(mot):
    """ Revoie un triplet
    (code_additionne, code_concatene, mot_est_parfait) où :
     - code_additionne est la somme des codes des lettres du mot ;
     - code_concatene est le code des lettres du mot concaténées ;
     - mot_est_parfait est un booléen indiquant si le mot est parfait."""
    code_concatene = ""
    code_additionne = ...
    for c in mot:
        code_concatene = code_concatene + ...
        code_additionne = code_additionne + ...
    code_concatene = int(code_concatene)
    mot_est_parfait = ...
    return code_additionne, code_concatene, mot_est_parfait

#print(codes_parfait(""))