import time

def SIunit():
    try:
        print("")

        print('\33[93m' + '-' * 16 + 'CONVERSION OF UNITS' + '-' * 17 + '\33[0m')
        print("")
        print("[1] Measuring Length Conversion")
        print("[2] Measuring Time Conversion")
        print("[3] Measuring Area Conversion")
        print("[4] Measuring Weight/Mass Conversion")
        print("[5] Measuring Speed Conversion")
        print("")

        UserInput = int(input("Choose Conversion Type: "))
        print("")

        if UserInput == 1:
            print('---------------Conversion for Measuring Length---------------')
            print()
            user = float(input("Enter any number to be converted: "))
            print("")
            milli = user * 1000
            foot = user / 304800
            inch = user * 36
            print("Yard to Inches:          ", '\33[92m', round(inch, 5), "inch", '\33[0m')
            print()
            print("Meter to Millimeter:     ", '\33[92m', round(milli, 5), "mm", '\33[0m')
            print()
            print("Micron to Foot:          ", '\33[92m', round(foot, 5), "ft", '\33[0m')
            print()

        elif UserInput == 2:
            print('----------------Conversion for Measuring Time----------------')
            print()
            user = float(input("Enter any number to be converted: "))
            print("")
            hr = user / 3600
            sec = user * 60
            month = user / 4.3452381
            print("Seconds to Hour:         ", '\33[92m', round(hr, 5), "hr", '\33[0m')
            print()
            print("Minute to Seconds:       ", '\33[92m', round(sec, 5), "seconds", '\33[0m')
            print()
            print("Week to Month:           ", '\33[92m', round(month, 5), "months", '\33[0m')

        elif UserInput == 3:
            print('----------------Conversion for Measuring Area----------------')
            print()
            user = float(input("Enter any number to be converted: "))
            print("")
            sm = user / 1550.0031
            ft = user * 2.47105381
            syard = user * 1195990.046
            print("Square Inch to Square Meter:     ", '\33[92m', round(sm, 5), "㎡", '\33[0m')
            print()
            print("Hectare to Acre:                 ", '\33[92m', round(ft, 5), "ac", '\33[0m')
            print()
            print("Square Kilometer to Square Yard: ", '\33[92m', round(syard, 5), "yd^2", '\33[0m')

        elif UserInput == 4:
            print('------------Conversion for Measuring Weight(Mass)------------')
            print()
            user = float(input("Enter any number to be converted: "))
            print("")
            dr = user / 3.8879346
            gram = user * 1000
            kg = user / 1000
            print("Gram to Dram:        ", '\33[92m', round(dr, 5), "dr", '\33[0m')
            print()
            print("Kilogram to Gram:    ", '\33[92m', round(gram, 5), "g", '\33[0m')
            print()
            print("Gram to Kilogram:    ", '\33[92m', round(kg, 5), "kg", '\33[0m')
            print()

        elif UserInput == 5:
            print('---------------Conversion for Measuring Speed----------------')
            print()
            user = float(input("Enter any number to be converted: "))
            print("")
            mihr = user / 2.23693629
            msec = user * 3.2808399
            knot = user / 1.68780986
            print("Miles per Hour to Meters per Second:     ", '\33[92m', round(mihr, 5), "miles/hr", '\33[0m')
            print()
            print("Meter per Second to Foot per Second:     ", '\33[92m', round(msec, 5), "ft/s", '\33[0m')
            print()
            print("Foot per Second to Knot:                 ", '\33[92m', round(knot, 5), "knots", '\33[0m')
        else:
            print('Invalid input.')
    except Exception():
        print("ERROR: ", Exception)

def Temperature():
    try:
        print("")
        import math

        print('\33[93m' + '-' * 16 + 'UNIT CONVERSION FOR TEMPERATURE' + '-' * 17 + '\33[0m')
        print("")
        user = float(input("Enter any number to be converted: "))
        print("")
        print("[K] KELVIN")
        print("[F] FAHRENHEIT")
        print("[C] CELSIUS")
        print("")
        a = str.upper(input("Choose from the following Units to be Converted: "))
        print("")

        if a == 'K':
            print("[1] Celsius to Kelvin")
            print("[2] Fahrenheit to Kelvin")
            print("")
            choice = int(input("INPUT: "))
            if choice == 1:
                kelvin = user + 273.15
                print("")
                print("The converted value is:", '\33[94m', round(kelvin, 2), "K", '\33[0m')
                print("")
                UserInput = str.upper(input("PRESS [X] TO RETRY || PRESS [Y] FOR MAIN MENU: "))
                if UserInput == 'X':
                    print("\n" * 30)
                    Temperature()
                elif UserInput == 'Y':
                    print("\n" * 30)
                    Menu()
                else:
                    print("INVALID INPUT, RETRYING...")
                    time.sleep(2)
                    Temperature()
            elif choice == 2:
                kelvin2 = (user - 32) * (5 / 9) + 273.15
                print("")
                print("The converted value is:", '\33[94m', round(kelvin2, 2), "K", '\33[0m')
                print("")
                UserInput = str.upper(input("PRESS [X] TO RETRY || PRESS [Y] FOR MAIN MENU: "))
                if UserInput == 'X':
                    print("\n" * 30)
                    Temperature()
                elif UserInput == 'Y':
                    print("\n" * 30)
                    Menu()
                else:
                    print("INVALID INPUT, RETRYING...")
                    time.sleep(2)
                    Temperature()
        elif a == 'F':
            print("[1] Celsius to Fahrenheit")
            print("[2] Kelvin to Fahrenheit")
            print("")
            choice2 = int(input("INPUT: "))
            if choice2 == 1:
                fahrenheit = user * (9 / 5) + 32
                print("")
                print("The converted value is:", '\33[94m', round(fahrenheit, 2), "°F", '\33[0m')
                print("")
                UserInput = str.upper(input("PRESS [X] TO RETRY || PRESS [Y] FOR MAIN MENU: "))
                if UserInput == 'X':
                    print("\n" * 30)
                    Temperature()
                elif UserInput == 'Y':
                    print("\n" * 30)
                    Menu()
                else:
                    print("INVALID INPUT, RETRYING...")
                    time.sleep(2)
                    Temperature()

            elif choice2 == 2:
                fahren2 = (user - 273.15) * (9 / 5) + 32
                print("")
                print("The converted value is:", '\33[94m', round(fahren2, 2), "°F", '\33[0m')
                print("")
                UserInput = str.upper(input("PRESS [X] TO RETRY || PRESS [Y] FOR MAIN MENU: "))
                if UserInput == 'X':
                    print("\n" * 30)
                    Temperature()
                elif UserInput == 'Y':
                    print("\n" * 30)
                    Menu()
                else:
                    print("INVALID INPUT, RETRYING...")
                    time.sleep(2)
                    Temperature()

        elif a == 'C':
            print("[1] Fahrenheit to Celsius")
            print("[2] Kelvin to Celsius")
            print("")
            choice3 = int(input("INPUT: "))
            if choice3 == 1:
                celsius = (user - 32) * (5 / 9)
                print("")
                print("The converted value is:", '\33[94m', round(celsius, 2), "°C", '\33[0m')
                print("")
                UserInput = str.upper(input("PRESS [X] TO RETRY || PRESS [Y] FOR MAIN MENU: "))
                if UserInput == 'X':
                    print("\n" * 30)
                    Temperature()
                elif UserInput == 'Y':
                    print("\n" * 30)
                    Menu()
                else:
                    print("INVALID INPUT, RETRYING...")
                    time.sleep(2)
                    Temperature()

            elif choice3 == 2:
                celsi2 = user - 273.15
                print("")
                print("The converted value is:", '\33[94m', round(celsi2, 2), "°C", '\33[0m')
                print("")
                UserInput = str.upper(input("PRESS [X] TO RETRY || PRESS [Y] FOR MAIN MENU: "))
                if UserInput == 'X':
                    print("\n" * 30)
                    Temperature()
                elif UserInput == 'Y':
                    print("\n" * 30)
                    Menu()
                else:
                    print("INVALID INPUT, RETRYING...")
                    time.sleep(2)
                    Temperature()
        else:
            print("INVALID INPUT, RETRY")
            Temperature()
    except Exception():
        print("ERROR: ", Exception)

def Ohm():
    try:
        print("1. Calculate Resistance")
        print("2. Calculate Voltage")
        print("3. Calculate Current")
        print("4. Main Menu")
        print("")
        UserInput = input("INPUT: ")

        if (UserInput == "1"):
            print("")
            print("***** Calculating Resistance *****")
            v = float(input("Voltage: "))
            i = float(input("Current: "))
            r = v / i
            print("")
            print("CALCULATING...")
            time.sleep(2)
            print("")
            print("Resistance = " + '\33[94m', round(r, 2), "Ohm(Ω)", '\33[0m')

        elif (UserInput == "2"):
            print("")
            print("***** Calculating Voltage *****")
            i = float(input("Current: "))
            r = float(input("Resistence: "))
            v = i * r
            print("")
            print("CALCULATING...")
            time.sleep(2)
            print("")
            print("Voltage = " + '\33[94m', round(v, 2), "V", '\33[0m')

        elif (UserInput == "3"):
            print("")
            print("***** Calculating Current *****")
            v = float(input("Voltage: "))
            r = float(input("Resistence: "))
            i = v / r
            print("")
            print("CALCULATING...")
            time.sleep(2)
            print("")
            print("Current = " + '\33[94m', round(i, 2), "A", '\33[0m')

        elif (UserInput == "4"):
            print("")
            Menu()
        else:
            print("Invalid Input, Retry")
            Ohm()

    except Exception:
        print("ERROR: ", Exception)
        Ohm()

def Menu():
    try:
        print("")
        print('\33[93m' + '-' * 10 + "UNIT CONVERSION & OHM'S LAW CALCULATOR" + '-' * + 10 + '\u001b[0m')
        print("")
        print("\t\tWelcome! Please Choose on What to Operate")
        print("")
        print("\t\t\t   [1] SI UNIT CONVERSION")
        print("\t\t\t   [2] TEMPERATURE CONVERSION")
        print("\t\t\t   [3] OHM'S LAW CALCULATOR")
        print("\t\t\t   [4] ABOUT US")
        print("\t\t\t   [5] EXIT SYSTEM")
        print("")
        UserInput = input("\t\t\t   INPUT: ")

        if UserInput == '1':
            print('\n' * 30)
            SIunit()
        elif UserInput == '2':
            print('\n' * 30)
            Temperature()
        elif UserInput == '3':
            print('\n' * 30)
            Ohm()
        elif UserInput == '4':
            print('\n' * 30)
            AboutUS()
        elif UserInput == '5':
            SystemExit()
    except Exception:
        print("ERROR:", Exception)
        Menu()

def AboutUS():
    try:
        print("")
        print('\33[93m' + '-' * 15 + "BSIT 203 PROJECT DEVELOPERS" + '-' * + 16 + '\u001b[0m')
        print("")
        print("\t\t   Daniel Valdez        [PROGRAM DEVELOPER]")
        print("\t\t   Jamelah Ayen Tipon   [PROGRAM DEVELOPER]")
        print("\t\t   Nichole Elseario     [CONCEPT PLANNER]")
        print("\t\t   Benz Elnasin         [SYSTEM FLOW]")
        print("\t\t   Cyrus Tizon          [POWERPOINT/NOTES]")
        print("")
        UserInput = str.upper(input("PRESS [X] FOR MAIN MENU: "))

        if UserInput == 'X':
            Menu()
        else:
            print("Invalid Input")
            AboutUS()

    except Exception:
        print("ERROR:", Exception)
        AboutUS()

Menu()