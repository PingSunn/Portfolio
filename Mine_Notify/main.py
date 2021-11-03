# Lastes Dev in Python 3.10.0
# Edit Line_Token & address before run
import requests
import pytz
from datetime import datetime

token = "4VsNnz6rhKaqBGRIIPZ0lzvFQRmaoR5k4Nch4OqrOaQ"
address = "5Df98F28D0F64b4D46e44afB01E04dD63F715aE4"




url = "https://notify-api.line.me/api/notify"
timeNow = pytz.timezone("Asia/Bangkok")
datetime_TH = datetime.now(timeNow)

# Ethermine
Res = requests.get(
    "https://api.ethermine.org/miner/" + address + "/dashboard"
)

mega = 10**6
giga = 10**9
tera = 10**12

def alert():
    if Res.status_code == 200:
        callback = Res.json()
        active = str(callback["data"]["currentStatistics"]["activeWorkers"])
        avgHr = callback["data"]["statistics"][0]["reportedHashrate"]

        if (avgHr >= tera):
            avgHr_usage = "{:.2f} TH/s ⛏️ \n".format(avgHr * (10 ** -12))
        elif (avgHr >= giga):
            avgHr_usage = "{:.2f} GH/s ⛏️ \n".format(avgHr * (10 ** -9))
        elif (avgHr >= mega):
            avgHr_usage = "{:.2f} MH/s ⛏️ \n".format(avgHr * (10 ** -6))
        else:
            avgHr_usage = "{:.2f} H/s ⛏️ \n".format(avgHr)

        unpaid = callback["data"]["currentStatistics"]["unpaid"]
        unpaid_usage = "{:.5f}".format(unpaid * (10 ** -18))



    headers = {
        "Content-Type": "application/x-www-form-urlencoded",
        "Authorization": "Bearer {}".format(token),
    }

    message = (
        "\n🖥️  Address : "
        + address[:5] + "......" + address[-4:]
        + "  \n"
        + "      | - Hashrate : "
        + avgHr_usage
        + "      | - Unpaid : "
        + unpaid_usage
        + " ETH 💰\n"
        + "      | - Active : "
        + active
        + " 🎅🏼  \n"
        + "      | - Time : "
        + datetime_TH.strftime("%H:%M:%S")
        + " ⌛"
    )

    r = requests.post(url=url, headers=headers, data={"message": message})

while True:
    alert()
    time.sleep(60*15)