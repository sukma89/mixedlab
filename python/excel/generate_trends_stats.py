# vim: set fileencoding=utf-8
import sys
import os.path
from xlwt import *
from datetime import date
from datetime import timedelta

if (len(sys.argv) < 2):
    print 'Usage: python generate_stats_trends.py DATA_FILE'
    sys.exit(1)

datafile = sys.argv[1]

title1 = ['total','total_hasc','userto','api','apihasc','apierr','apito','i_total','i_total_hasc','i_userto','i_api','i_apihasc','i_apierr','i_apito','a_total','a_total_hasc','a_userto','a_api','a_apihasc','a_apierr','a_apito','nouserto_noapi','i_nouserto_noapi','a_nouserto_noapi']

title2 = ['总请求','下发内容','时间限制','调用接口','接口有内容','返数据解析失败','接口超时','iPhone请求总量','iPhone下发总量','iPhone用户超时','iPhone接口调用','iPhone接口有内容','iPhone数据错误','iPhone接口超时','Android请求总量','Android下发问题','Android时间限制','Android调用接口','Android接口有内容','Android数据错误','Android接口超时','无用户超时无接口请求','iPhone','Android']

servers = ['server 1', 'server 2', 'server 3', 'server 4', 'server 5', 'server 6']

rlen = len(title1)
clen = len(servers)

data = [0 for x in xrange(clen)]
colWidth = [0 for x in xrange(rlen+1)]

if (os.path.exists(datafile)):
    fp = open(datafile, 'r')
    i = 0
    for line in fp:
        line = line.strip()
        if (len(line) < 1):
            continue
        cells = line.split()
        if (len(cells) < rlen):
            print 'Invalid data row detected'
            sys.exit(2)
        data[i] = cells
        i = i + 1
    if (i < 6):
        print 'Data records less than 6'
else:
    print 'Failed to read file: ', datafile
    sys.exit(1)

yesterday = date.today() - timedelta(1)
yesterday_iso = yesterday.isoformat()

w = Workbook(encoding="UTF-8")
ws = w.add_sheet(yesterday_iso)


#font0 = Font()
#font0.name = 'SimSun'
#font0.bold = True

#styleTitle = XFStyle()
#styleTitle.font = font0
styleTitle = easyxf('font: bold on; align: horiz center');
styleTitle0 = easyxf('align: horiz center'); 

font1 = Font()
font1.name = 'SimSun'
font1.bold = True

styleTotal = XFStyle()
styleTotal.font = font1
styleTotal.num_format_str = '#,##0'

ws.write(1, 0, yesterday_iso, styleTitle)
ws.write(8, 0, 'Total', styleTitle)

colWidth[0] = len(yesterday_iso)

i = 0 
while (i < rlen):
    len1 = len(title1[i])
    len2 = len(title2[i])
    if (len1 > len2):
        colWidth[i+1] = len1
    else:
        colWidth[i+1] = len2

    ws.write(0, i+1, title1[i], styleTitle0)
    ws.write(1, i+1, title2[i], styleTitle)
    i += 1

i = 0 
while (i < clen):
    ws.write(i+2, 0, servers[i])
    i += 1

numStyle = XFStyle()
numStyle.num_format_str = '#,##0'

r = 0
while (r < rlen):
    c = 0
    while (c < clen):
        width = len(data[c][r])
        if (colWidth[r+1] < width):
            colWidth[r+1] = width

        ws.write(c+2, r+1, int(data[c][r]), numStyle)
        c = c + 1

    ws.write(c+2, r+1, Formula('SUM({0}3:{0}8)\n'.format(chr(66+r))), styleTotal)
    r = r + 1

floatPStyle = XFStyle()
floatPStyle.num_format_str = '0.00%'
ws.write(13, 0, '接口超时')
ws.write(13, 1, Formula('H9/E9'), floatPStyle)

i = 0
pcells = [1, 2, 3, 4, 7]
while (i <= rlen):
    width = colWidth[i]
    if (i in pcells):
        width = width + 5 
    ws.col(i).width = width * 256
    i = i + 1

df = yesterday.strftime('%Y%m%d')
fname = 'stats_trends-{0}.xls'.format(df)
w.save(fname);

