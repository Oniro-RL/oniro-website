function escapeRegExp(string) {
    return string.replace(/([.*+?^${}()|\[\]\/\\])/g, "\\$1");
}

class smiley {
    constructor(jvc, name, oneSpecial = false) {
        this.jvc = jvc;
        this.name = name;
        this.oneSpecial = oneSpecial;

        if (this.oneSpecial) {
            this.regex = new RegExp(':' + escapeRegExp(this.name), 'gi');
        } else {
            this.regex = new RegExp(':' + this.name + ':', 'g');
        }

        if (this.jvc) {
            this.path = "ressources/img/smileys/jvc/";
        } else this.path = "ressources/img/smileys/";

        return document.body.innerHTML = document.body.innerHTML.replace(this.regex, '<img src=' + this.path + this.name + ".gif" + ' alt=' + this.name + ' />');
    };
};

// SMILEYS /////////////////////
new smiley(true, ")", true);
new smiley(true, "(", true);
new smiley(true, "-((", true);
new smiley(true, "-(", true);
new smiley(true, "-)))", true);
new smiley(true, "-)", true);
new smiley(true, "-D", true);
new smiley(true, "o))", true);
new smiley(true, "-p", true);

new smiley(true, "ange");
new smiley(true, "diable");
new smiley(true, "banzai");
new smiley(true, "bave");
new smiley(true, "bravo");
new smiley(true, "cd");
new smiley(true, "coeur");
new smiley(true, "content");
new smiley(true, "cool");
new smiley(true, "doute");
new smiley(true, "fete");
new smiley(true, "fier");
new smiley(true, "fou");
new smiley(true, "gba");
new smiley(true, "gni");
new smiley(true, "noel");
new smiley(true, "hap");
new smiley(true, "honte");
new smiley(true, "hum");
new smiley(true, "malade");
new smiley(true, "monoeil");
new smiley(true, "mort");
new smiley(true, "nah");
new smiley(true, "non");
new smiley(true, "non2");
new smiley(true, "nonnon");
new smiley(true, "cute");
new smiley(true, "ok");
new smiley(true, "ouch");
new smiley(true, "ouch2");
new smiley(true, "oui");
new smiley(true, "pacd");
new smiley(true, "pacg");
new smiley(true, "peur");
new smiley(true, "pf");
new smiley(true, "play");
new smiley(true, "question");
new smiley(true, "rire");
new smiley(true, "rire2");
new smiley(true, "rouge");
new smiley(true, "snif2");
new smiley(true, "sournois");
new smiley(true, "siffle");

// OTHERS
new smiley(true, "d)", true);
new smiley(true, "g)", true);

// PANNEAU
new smiley(true, "bye");
new smiley(true, "dehors");
new smiley(true, "desole");
new smiley(true, "gne");
new smiley(true, "hs");
new smiley(true, "hello");
new smiley(true, "merci");
new smiley(true, "objection");
new smiley(true, "pave");
new smiley(true, "salut");
new smiley(true, "svp");

// ADDITIONNELS ///////////////
new smiley(false, "heureux");
new smiley(false, "mecontent");

// PANNEAU
new smiley(false, "fete_rl");

// CEUX QUI FONT TOUT BUGUER 
new smiley(true, "p", true);
