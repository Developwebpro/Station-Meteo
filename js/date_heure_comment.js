function date_heure_comment(id)
{
        date = new Date;
        annee = date.getFullYear();
        moi = date.getMonth();
        mois = new Array('Jan', 'F&eacute;v', 'Mars', 'Avr', 'Mai', 'Juin', 'Jui', 'Ao&ucirc;t', 'Sept', 'Oct', 'Nov', 'D&eacute;c');
        j = date.getDate();
        jour = date.getDay();
        jours = new Array('Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        resultat = jours[jour]+' '+j+' '+mois[moi]+' ' +h+':'+m;
        document.getElementById(id).innerHTML = resultat;
        setTimeout('date_heure_comment("'+id+'");','1000');
        return true;
}