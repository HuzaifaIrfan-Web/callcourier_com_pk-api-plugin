
import grequests

import datetime
import json
urls = [
]

url='https://cod.callcourier.com.pk/api/CallCourier/GetTackingHistory?cn=10241520611771'


for _ in range(0,10):
    urls.append(url)


start=datetime.datetime.now()

print(start)

rs = (grequests.get(u) for u in urls)






responses = grequests.map(rs)



for res in responses:
    # print(res.content)
 
    lis = json.loads(res.content)
    # print(d.keys())
    print(res)

    # print(str(res.content))

    if isinstance(lis, list):

        li=lis[0]
        # print(li)


        print(li['ConsignmentNo'])
        
        print(li['HomeBranch'])
        print(li['DestBranch'])
        print(li['OriginCity'])
        print(li['ConsigneeCity'])
        print(li['ShipperAddress'])
        print(li['ConsigneeAddress'])
        print(li['ContactNo'])
        print(li['ShipperName'])

        print('\n')

        for li in lis:
            print(li['TransactionDate'])
            print(li['CallDate'])
            print(li['OperationDesc'].strip())
            print(li['ProcessDescForPortal'].strip())
            print(li['ReceiverName'])
            print(li['Relation'])


            print('\n')




    else:
        print('NO Record Found')





    print(len(lis))



end=datetime.datetime.now()
print(end-start)
