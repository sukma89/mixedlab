import thread, time

def child(tid):
    print('Hello from thread', tid)
    for i in range(5):
        print 'Thread ', tid , ': ', i
        time.sleep(1)

def parent():
    i = 0
    while True:
        i += 1
        thread.start_new_thread(child, (i,))
        if raw_input() == 'q': break

parent()

