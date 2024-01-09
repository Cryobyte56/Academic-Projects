"""
AUTHOR: DANIEL VALDEZ
BSIT 203
DATE: SEPTEMBER 17, 2022
"""

print("-" * 25 + '\33[1m' + "INVESTMENT REPORT" + "-" * 25 + '\33[0m')
print(" ")
StartBalance = float(input("ENTER INVESTMENT AMOUNT: "))
years = int(input("ENTER NUMBER OF YEARS: "))
Rate = float(input("ENTER RATE in PERCENTAGE: "))
TotalInterest = 0
year = 0
print(" ")

#DISPLAYING THE TABLE's HEADER
print("%4s%18s%10s%16s" % \
      ("YEAR", "STARTING BALANCE", "INTEREST", "ENDING BALANCE"))

#COMPUTATION
for year in range(1, years + 1):
    interest = StartBalance * (Rate / 100)
    EndBalance = StartBalance + interest
    print("%4d%18.2f%10.2f%16.2f" % \
          (year, StartBalance, interest, EndBalance))
    StartBalance = EndBalance
    TotalInterest += interest
print("")
print("ENDING BALANCE: " + '\33[93m' +"$"+ format(EndBalance, '.2f') + '\33[0m')
print("TOTAL INTEREST EARNED: " + '\33[93m' +"$"+ format(TotalInterest, '.2f') + '\33[0m')



