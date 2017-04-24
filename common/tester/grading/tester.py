#!/usr/bin/env python

import os
import subprocess
from subprocess import PIPE

def run(program, test, files = False):
    result = {
        'total': 0,
        'passed': 0,
        'diff': [],
    }
    test = open(test, 'r').read().split('\n\n')
    
    for (block1, block2) in zip(*[iter(test)]*2):
        task = block1.strip('*\n')
        answer = block2.strip('*\n') + '\n'
        
        result['total'] += 1
        if files:
            stdin = ''
            with open('task.in', 'w') as f:
                f.write(task)
        else:
            stdin = task
        
        process = subprocess.Popen(program, stdin=PIPE, stdout=PIPE, stderr=PIPE, shell=True)
        try:
            stdout, stderr = process.communicate(stdin)
        except OSError:
            raise ExecuteError
        
        if process.returncode != 0:
            raise ExecuteError("\n" + stderr)
        
        if files:
            try:
                taskResult = ''
                with open('task.out', 'r') as f:
                    taskResult = f.read()
            except IOError:
                pass
        else:
            taskResult = stdout
        
        taskResult = taskResult.replace("\r", "")
        if answer == taskResult:
            result['passed'] += 1
        else:
            result['diff'].append({'input': task, 'expected': answer, 'result': taskResult})
        
    return result

class ExecuteError (Exception):
    pass
