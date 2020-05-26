#!/bin/bash
#
# Merge script for SVN 
# Author   - Sameera Rukshan
# Modified - M S C Silva
# 10/3/2016 for Rajeeda Holdings Software
#
# CONSTs
svnTRUNK="http://svn.crplk.com/svn/rajeeda/crp/trunk"
svnQA="http://svn.crplk.com/svn/rajeeda/crp/qa"
svnINT="http://svn.crplk.com/svn/rajeeda/crp/int"

# Reading User Inputs
echo "Enter Ticket Number To Merge:" 
echo -n "CSD-"
read ticket
echo "CSD-$ticket" >> ticketlist.txt

# Where to merge?
echo "Merge to crp/qa or crp/int : (q/i)?"
read var
case "$var" in
	q)
		echo "svn up on crp/trunk"
		echo "---"
		test -d crp/trunk && svn up crp/trunk || svn co $svnTRUNK
		echo "---"
		echo "Looking for changes in trunk ..."
		svn -v log crp/trunk | grep -iB10 -E "CSD-$ticket$"
		echo "--- ---"
		echo "svn up on QA branch"
		svn st crp/qa
		test -d crp/qa && svn up crp/qa || svn co $svnQA
		echo "			"
		echo "Merging begins ..."
		echo "			"
		rm -rf latest.txt version.txt
		svn log crp/qa | grep -iB3 -E "CSD-$ticket$"| grep line | awk {'print $1'} |sed s/r// |head -1 > latest.txt
		test -s latest.txt || echo 1 > latest.txt
		svn log crp/trunk/ | grep -iB3 -E "CSD-$ticket$"| grep line | awk {'print $1'} |sed s/r// | sort | while read line ;do if [ $line -gt `cat latest.txt` ]; then echo $line; fi;done > version.txt
		for a in `cat version.txt`
		do
		 let b=1
		 let c=($a-$b)
		 echo "---"
		 echo "svn merge -r $c:$a $svnTRUNK crp/qa/"
		 echo "---"
		 svn merge -r $c:$a $svnTRUNK crp/qa/
		done;
		echo "---"
		svn st crp/qa

		svn ci crp/qa -m "CSD-$ticket"
		echo "Changes committed with CSD-$ticket crp/qa"
		echo "--- ---"
	;;
	i)
		echo "svn up on qa/crp"
                echo "---"
                svn up qa/crp
	        echo "--- ---"
		echo "Looking for changes in qa ..."
                svn -v log qa/crp | grep -iB10 -E "CSD-$ticket$"
                echo "--- ---"
		echo "svn up on INT branch"
		svn st int/crp	
		test -d int && svn up int || svn co $svnINT
		echo "                  "
		echo "Merging begins ..."
		echo "                  "
		rm -rf latest.txt version.txt
                svn log int/crp | grep -iB3 -E "CSD-$ticket$"| grep line | awk {'print $1'} |sed s/r// |head -1 > latest.txt
                test -s latest.txt || echo 1 > latest.txt
                svn log qa/crp/ | grep -iB3 -E "CSD-$ticket$"| grep line | awk {'print $1'} |sed s/r// | sort | while read line ;do if [ $line -gt `cat latest.txt` ]; then echo $line; fi;done > version.txt
                for a in `cat version.txt`
                do
                 let b=1
                 let c=($a-$b)
		 echo "---"
		 echo "svn merge -r $c:$a $svnQA int/crp"
		 echo "			"
                 svn merge -r $c:$a $svnQA int/crp
                done;
		echo "---"
                svn st int/crp

		svn ci int/crp -m "CSD-$ticket"
		echo "Changes committed with CSD-$ticket int/crp"
		echo "--- ---"
	;;
	
	*)
                echo "Usage: [q|i]"
		exit 0;
        ;;
esac

echo "Merging completed, Resolve conflicts if exist ..."
echo "--- ---"
