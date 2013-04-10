import os

param = 0

while True:
    param += 1
    pid = os.fork()
    if pid == 0:
        #os.execlp('python', 'python', 'child.py', str(param))
        #os.execlp('bash', 'bash', 'child.sh', str(param))
        #os.execl('/bin/bash', 'bash', 'child.sh', str(param))
        os.execl('/bin/bash', '/bin/bash', 'child.sh', str(param))
        assert False, 'Error starting program'
    else:
        print('Child is ', pid)
        if raw_input() == 'q': break

