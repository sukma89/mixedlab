
global_v = 10
global_y = 11

def test_func():
    global global_y
    print "global_v = ", global_v
    print "global_y = ", global_y

test_func()

