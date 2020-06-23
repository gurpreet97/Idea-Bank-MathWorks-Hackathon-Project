function chart(ipi,pi,ci,ipp,pp,cp,ipi1,pi1,ci1,ipp1,pp1,cp1)
    %User
    filename = 'mainUser.png';
    idea = ipi+pi+ci;
    problem = ipp+pp+cp;
    pie([idea , problem]);
    legend({'IDEA','PROBLEM'},'Location','best');
    saveas(gcf,filename);
    filename = 'ideaUser.png';
    idea = [ipi pi ci];
    pie(idea);
    legend({'Idea Proposed','In Progress','Completed'},'Location','best');
    saveas(gcf,filename);
    
    %Overall
    filename = 'main.png';
    idea = ipi1+pi1+ci1;
    problem = ipp1+pp1+cp1;
    pie([idea , problem]);
    legend({'IDEA','PROBLEM'},'Location','best');
    saveas(gcf,filename);
    filename = 'idea.png';
    idea = [ipi1 pi1 ci1];
    pie(idea);
    legend({'Idea Proposed','In Progress','Completed'},'Location','best');
    saveas(gcf,filename);
    
end
