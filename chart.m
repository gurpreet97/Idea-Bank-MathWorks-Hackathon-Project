function chart(ipi,pi,ci,ipp,pp,cp)
    filename = 'main.png';
    idea = ipi+pi+ci;
    problem = ipp+pp+cp;
    pie([idea , problem]);
    legend({'IDEA','PROBLEM'},'Location','best');
    saveas(gcf,filename);
    filename = 'idea.png';
    idea = [ipi pi ci];
    pie(idea);
    legend({'Idea Proposed','In Progress','Completed'},'Location','best');
    saveas(gcf,filename);
    filename = 'problem.png';
    problem = [ipp pp cp];
    pie(problem);
    legend({'Idea Proposed','In Progress','Completed'},'Location','best');
    saveas(gcf,filename);
end
