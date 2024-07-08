#! /usr/bin/python
# ! -*- coding: utf-8 -*-

import sys
import unittest
import os
import time
from random import randint

sys.path.append(os.path.join(os.path.dirname(__file__), '../src'))
from RtcTokenBuilder import *
import AccessToken

appID = "970CA35de60c44645bbae8a215061b33"
appCertificate = "5CFd2fd1755d40ecb72977518be15d3b"
channelName = "7d72365eb983485397e3e3f9d460bdda"
uid = 2882341273
userAccount = "2882341273"
expireTimeInSeconds = 3600
currentTimestamp = int(time.time())
privilegeExpiredTs = currentTimestamp + expireTimeInSeconds


def main():
    token = RtcTokenBuilder.build_token_with_uid(appID, appCertificate, channelName, uid, Role_Attendee, privilegeExpiredTs)
    print("Token with int uid: {}".format(token))
    token = RtcTokenBuilder.build_token_with_account(appID, appCertificate, channelName, userAccount, Role_Attendee, privilegeExpiredTs)
    print("Token with user account: {}".format(token))
    token = RtcTokenBuilder.buildTokenWithUidAndPrivilege(appID, appCertificate, channelName, uid, 
                                              privilegeExpiredTs, privilegeExpiredTs,
                                              privilegeExpiredTs, privilegeExpiredTs)
    print("Token with int uid user defined privilege: {}".format(token))

    token = RtcTokenBuilder.buildTokenWithUserAccountAndPrivilege(appID, appCertificate, channelName, userAccount,
                                                  privilegeExpiredTs, privilegeExpiredTs,
                                                  privilegeExpiredTs, privilegeExpiredTs)
    print("Token with user account user defined privilege: {}".format(token))

if __name__ == "__main__":
    main()
