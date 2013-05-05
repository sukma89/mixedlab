# -*- coding: utf-8 -*-


'''
Sequence Math script

Usage:

SHELL$ python seqmatch.py INPUT_FILE OUTPUT_FILE

'''

import sys

class SeqMatch:

	fieldSeparator = "\t"
	
	def __init__(self, inputFile, outputFile):
		self.inputFile = inputFile
		self.outputFile = outputFile
	
	def run(self):
		try:
			ifp = open(self.inputFile, 'r')
			ofp = open(self.outputFile, 'w')

			for line in ifp:
				line = line.strip()
				fields = line.split(self.fieldSeparator)
				if len(fields) < 2:
					print "Invalid row detected:", line
					continue
				matchValue = self.orderMatch(fields[0], fields[1])
				if (matchValue < 0):
					# does nothing if invalid value detected or only 1 char match
					continue
				ofp.write(line + "\t" + str(matchValue) + "\n")
			
			ifp.close()
			ofp.close()
		except IOError:
			raise

	@staticmethod
	def orderMatch(seq1, seq2):
		charLen = len(seq1)
		if not charLen == len(seq2):
			return -2

		i = 0
		matchCount = 0 
		while (i < charLen):
			if seq1[i] == seq2[i]:
				matchCount += 1	
			i+=1	
		
		return { 
			4: 0, 
			3: 3, 
			2: 2, 
			1: -1,
			0: 1 
		}[matchCount]

	@staticmethod
	def countMatch(seq1, seq2):
		#TODO implements countMatch()
		print "count match"


if __name__ == '__main__':
	if len(sys.argv) < 3:
		print "Usage: %s INPUT_FILE OUTPUT_FILE" % sys.argv[0]
		sys.exit(1)
	
	smatch = SeqMatch(sys.argv[1], sys.argv[2])
	smatch.run()
	
