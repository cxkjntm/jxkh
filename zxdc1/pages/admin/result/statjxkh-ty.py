
# coding: utf-8

# In[2]:

import numpy as np
import pandas as pd
import pymysql
from sqlalchemy import create_engine
engine = create_engine("mysql+pymysql://root:123456@localhost/jxkh")

# In[3]:

db = pymysql.connect(host="localhost", user="root",password="123456", db="jxkh", port=3306, charset="utf8")


# In[4]:

sql_recordcode="select RecordCode from voterecord where khtype=1 and status='Finished'"
dfcode=pd.read_sql(sql_recordcode,con=db)
code=dfcode["RecordCode"][0]


# In[14]:

sql="Select DeptID, DeptName, DeptMemo from deptinfo Where DeptID<>1 order by DeptID "
df=pd.read_sql(sql,con=db)
deptidarr=np.array(df)
deptidlist=deptidarr.tolist()


# In[15]:

deptidlist=df["DeptID"]
deptmemolist=df["DeptMemo"]


# In[16]:

resultlevel=[0,1,2,3]
xld_zcbz=['xld_0','xld_1','xld_2','xld_3']
zc_zcbz=['zc_0','zc_1','zc_2','zc_3']
bmm_zcbz=['bmm_0','bmm_1','bmm_2','bmm_3']
qz_zcbz=['qz_0','qz_1','qz_2','qz_3']


# In[17]:

for j in range(0,len(resultlevel)):
    xld_zcbz_num=[]
    for i in range(0,len(deptidlist)):
    #print(i)
    #print(deptlist[i])
        sql="SELECT COUNT(*) as num  FROM zc_ldbzkhinfo_"+code+" WHERE UserID IN (SELECT userID FROM userinfo WHERE LevelID=1) and DeptID="+str(deptidlist[i])+ " AND ZHKH="+        str(resultlevel[j])
    #print(sql)
        df1=pd.read_sql(sql,con=db)     
        num=df1["num"][0]
        xld_zcbz_num.append(num)
        #print(len(xld_zcbz_num))
    df[xld_zcbz[j]]=xld_zcbz_num
    
for j in range(0,len(resultlevel)):
    xld_zcbz_num=[]
    for i in range(0,len(deptidlist)):
    #print(i)
    #print(deptlist[i])
        sql="SELECT COUNT(*) as num  FROM zc_ldbzkhinfo_"+code+" WHERE UserID IN (SELECT userID FROM userinfo WHERE LevelID=2 or  LevelID=3 ) and DeptID="+str(deptidlist[i])+ " AND ZHKH="+        str(resultlevel[j])
    #print(sql)
        df1=pd.read_sql(sql,con=db)     
        num=df1["num"][0]
        xld_zcbz_num.append(num)
        #print(len(xld_zcbz_num))
    df[zc_zcbz[j]]=xld_zcbz_num    

for j in range(0,len(resultlevel)):
    xld_zcbz_num=[]
    for i in range(0,len(deptidlist)):
    #print(i)
    #print(deptlist[i])
        sql="SELECT COUNT(*) as num  FROM qz_ldbzkhinfo_"+code+" WHERE UserID IN (SELECT userID FROM userinfo WHERE DeptID="+str(deptidlist[i])+" ) and DeptID="+str(deptidlist[i])+ " AND ZTPJ="+        str(resultlevel[j])
        #print(sql)
        df1=pd.read_sql(sql,con=db)     
        num=df1["num"][0]
        xld_zcbz_num.append(num)
        #print(len(xld_zcbz_num))
    df[bmm_zcbz[j]]=xld_zcbz_num    
    
for j in range(0,len(resultlevel)):
    xld_zcbz_num=[]
    for i in range(0,len(deptidlist)):
    #print(i)
    #print(deptlist[i])
        if(deptmemolist[i]==u"科室"):
            sql="SELECT COUNT(*) as num  FROM zc_ldbzkhinfo_"+code+" WHERE UserID IN (SELECT userID FROM userinformation WHERE  IsDB=1 AND deptid IN (SELECT deptid FROM  deptinfo WHERE DeptMemo='院部')) and DeptID="+str(deptidlist[i])+" AND ZHKH="+            str(resultlevel[j])
        else:
            sql="SELECT COUNT(*) as num  FROM zc_ldbzkhinfo_"+code+" WHERE UserID IN (SELECT userID FROM userinfo WHERE LevelID=5 ) and DeptID="+str(deptidlist[i])+ " AND ZHKH="+            str(resultlevel[j])
        #print(sql)
        df1=pd.read_sql(sql,con=db)     
        num=df1["num"][0]
        xld_zcbz_num.append(num)
        #print(len(xld_zcbz_num))
    df[qz_zcbz[j]]=xld_zcbz_num       
    


# In[18]:

dfxld=df[["xld_0","xld_1","xld_2","xld_3"]]
dfzc=df[["zc_0","zc_1","zc_2","zc_3"]]
dfbmm=df[["bmm_0","bmm_1","bmm_2","bmm_3"]]
dfqz=df[["qz_0","qz_1","qz_2","qz_3"]]
xld_num=dfxld.apply(lambda x: x.sum(), axis=1)
df["xld_num"]=xld_num
zc_num=dfzc.apply(lambda x: x.sum(), axis=1)
df["zc_num"]=zc_num
bmm_num=dfbmm.apply(lambda x: x.sum(), axis=1)
df["bmm_num"]=bmm_num
qz_num=dfqz.apply(lambda x: x.sum(), axis=1)
df["qz_num"]=qz_num
result=(df["xld_0"]/df["xld_num"]*1.0+df["xld_1"]/df["xld_num"]*0.8+df["xld_2"]/df["xld_num"]*0.6+df["xld_3"]/df["xld_num"]*0.0)+ (df["zc_0"]/df["zc_num"]*1.0+df["zc_1"]/df["zc_num"]*0.8+df["zc_2"]/df["zc_num"]*0.6+df["zc_3"]/df["zc_num"]*0.0)+ (df["bmm_0"]/df["bmm_num"]*1.0+df["bmm_1"]/df["bmm_num"]*0.8+df["bmm_2"]/df["bmm_num"]*0.6+df["bmm_3"]/df["bmm_num"]*0.0)+ (df["qz_0"]/df["qz_num"]*1.0+df["qz_1"]/df["qz_num"]*0.8+df["qz_2"]/df["qz_num"]*0.6+df["qz_3"]/df["qz_num"]*0.0)
df["zcbz_result"]=result*20
df2=pd.DataFrame()
df2=df[["DeptID","DeptName" ,"zcbz_result"]]


# In[20]:

#df2.to_sql(con=db, name='zcbz_result_'+code, if_exists='replace')
df2.to_sql('zcbz_result_'+code,con=engine, if_exists='replace')

# In[34]:

xld_zczz=['xld_0','xld_1','xld_2','xld_3']
zc_zczz=['zc_0','zc_1','zc_2','zc_3']
bmm_zczz=['bmm_0','bmm_1','bmm_2','bmm_3']


# In[35]:

sql_zczz="select UserID, Account, UserName,DeptID,DeptName From userinformation where LevelID=2"
df_zczz=pd.read_sql(sql_zczz,con=db) 


# In[36]:

zczzidlist=df_zczz["UserID"]
for j in range(0,len(resultlevel)):
    zczz_num=[]
    for i in range(0,len(zczzidlist)):
    #print(i)
    #print(deptlist[i])
        sql="SELECT COUNT(*) as num  FROM zc_ldcykhinfo_"+code+" WHERE UserID IN (SELECT userID FROM userinfo WHERE LevelID=1) and BPUserID="+str(zczzidlist[i])+ " AND DDJS="+        str(resultlevel[j])
    #print(sql)
        df1=pd.read_sql(sql,con=db)     
        num=df1["num"][0]
        zczz_num.append(num)
        #print(len(xld_zcbz_num))
    df_zczz[xld_zczz[j]]=zczz_num
    
for j in range(0,len(resultlevel)):
    zczz_num=[]
    for i in range(0,len(zczzidlist)):
    #print(i)
    #print(deptlist[i])
        sql="SELECT COUNT(*) as num  FROM zc_ldcykhinfo_"+code+" WHERE UserID IN (SELECT userID FROM userinfo WHERE LevelID= 2 or LevelID=3 ) and BPUserID="+str(zczzidlist[i])+ " AND DDJS="+        str(resultlevel[j])
    #print(sql)
        df1=pd.read_sql(sql,con=db)     
        num=df1["num"][0]
        zczz_num.append(num)
        #print(len(xld_zcbz_num))
    df_zczz[zc_zczz[j]]=zczz_num    
    
for j in range(0,len(resultlevel)):
    zczz_num=[]
    for i in range(0,len(zczzidlist)):
    #print(i)
    #print(deptlist[i])
        sql="SELECT COUNT(*) as num  FROM qz_ldcykhinfo_"+code+" WHERE UserID IN (SELECT userID FROM userinformation WHERE DeptID in (select deptid from userinformation where UserID="+str(zczzidlist[i])+")  ) and BPUserID="+str(zczzidlist[i])+ " AND ZZSX="+        str(resultlevel[j])
        #print(sql)
        df1=pd.read_sql(sql,con=db)     
        num=df1["num"][0]
        zczz_num.append(num)
        #print(len(xld_zcbz_num))
    df_zczz[bmm_zczz[j]]=zczz_num       


# In[38]:

dfxld=df_zczz[["xld_0","xld_1","xld_2","xld_3"]]
dfzc=df_zczz[["zc_0","zc_1","zc_2","zc_3"]]
dfbmm=df_zczz[["bmm_0","bmm_1","bmm_2","bmm_3"]]
xld_num=dfxld.apply(lambda x: x.sum(), axis=1)
df_zczz["xld_num"]=xld_num
zc_num=dfzc.apply(lambda x: x.sum(), axis=1)
df_zczz["zc_num"]=zc_num
bmm_num=dfbmm.apply(lambda x: x.sum(), axis=1)
df_zczz["bmm_num"]=bmm_num


# In[39]:

resultzczz=(df_zczz["xld_0"]/df_zczz["xld_num"]*1.0+df_zczz["xld_1"]/df_zczz["xld_num"]*0.8+df_zczz["xld_2"]/df_zczz["xld_num"]*0.6+df_zczz["xld_3"]/df_zczz["xld_num"]*0.0)*20+ (df_zczz["zc_0"]/df_zczz["zc_num"]*1.0+df_zczz["zc_1"]/df_zczz["zc_num"]*0.8+df_zczz["zc_2"]/df_zczz["zc_num"]*0.6+df_zczz["zc_3"]/df_zczz["zc_num"]*0.0)*20+ (df_zczz["bmm_0"]/df_zczz["bmm_num"]*1.0+df_zczz["bmm_1"]/df_zczz["bmm_num"]*0.8+df_zczz["bmm_2"]/df_zczz["bmm_num"]*0.6+df_zczz["bmm_3"]/df_zczz["bmm_num"]*0.0)*40

df_zczz["zczz_result"]=resultzczz


# In[40]:

zczz_deptidlist=df_zczz["DeptID"]
zcbz_result=df["zcbz_result"]


# In[43]:

zczz_deptidlist=np.array(zczz_deptidlist)
#print(len(zczz_deptidlist))
deptidlist=np.array(deptidlist)
#print(len(deptidlist))
zczz_bzf=[]
for i in range(0, len(zczz_deptidlist)):    
    for j in range(0,len(deptidlist)):      
        if(zczz_deptidlist[i]==deptidlist[j]):
             
            #print("i is ",i,"and j is ",j,"--",zczz_deptidlist[i],"/",deptidlist[j],"ok")
        #else:
            #print("i is ",i,"and j is ",j,"--",zczz_deptidlist[i],"/",deptidlist[j],"error")
            bzf=zcbz_result[j]*0.2
            zczz_bzf.append(bzf)
df_zczz["zczz_bzf"]=zczz_bzf       
df_zczz["zczz_fr"]=df_zczz["zczz_bzf"]+df_zczz["zczz_result"]                      
        


# In[46]:

df1_zczz=df_zczz[["Account","UserName","DeptName", "zczz_fr"]]
#df1_zczz.to_sql(con=db, name='zczz_result_'+code, if_exists='replace')
df1_zczz.to_sql('zczz_result_'+code, con=engine, if_exists='replace')


# In[47]:

xld_zcfz=['xld_0','xld_1','xld_2','xld_3']
zc_zcfz=['zc_0','zc_1','zc_2','zc_3']
bmm_zcfz=['bmm_0','bmm_1','bmm_2','bmm_3']
zpf_zcfz=['zpf_0','zpf_1','zpf_2','zpf_3']


# In[48]:

sql_zcfz="select UserID, Account, UserName,DeptID,DeptName From userinformation where LevelID=3"
df_zcfz=pd.read_sql(sql_zcfz,con=db) 


# In[49]:

df_zcfzidlist=df_zcfz["UserID"]
for j in range(0,len(resultlevel)):
    zcfz_num=[]
    for i in range(0,len(df_zcfzidlist)):
    #print(i)
    #print(deptlist[i])
        sql="SELECT COUNT(*) as num  FROM zc_ldcykhinfo_"+code+" WHERE UserID IN (SELECT userID FROM userinfo WHERE LevelID=1) and BPUserID="+str(df_zcfzidlist[i])+ " AND DDJS="+        str(resultlevel[j])
    #print(sql)
        df1=pd.read_sql(sql,con=db)     
        num=df1["num"][0]
        zcfz_num.append(num)
        #print(len(xld_zcbz_num))
    df_zcfz[xld_zcfz[j]]=zcfz_num
    
for j in range(0,len(resultlevel)):
    zcfz_num=[]
    for i in range(0,len(df_zcfzidlist)):
    #print(i)
    #print(deptlist[i])
        sql="SELECT COUNT(*) as num  FROM zc_ldcykhinfo_"+code+" WHERE UserID IN (SELECT userID FROM userinfo WHERE LevelID= 2 or LevelID=3 ) and BPUserID="+str(df_zcfzidlist[i])+ " AND DDJS="+        str(resultlevel[j])
    #print(sql)
        df1=pd.read_sql(sql,con=db)     
        num=df1["num"][0]
        zcfz_num.append(num)
        #print(len(xld_zcbz_num))
    df_zcfz[zc_zcfz[j]]=zcfz_num    
    
for j in range(0,len(resultlevel)):
    zcfz_num=[]
    for i in range(0,len(df_zcfzidlist)):
    #print(i)
    #print(deptlist[i])
        sql="SELECT COUNT(*) as num  FROM qz_ldcykhinfo_"+code+" WHERE UserID IN (SELECT userID FROM userinformation WHERE DeptID in (select deptid from userinformation where UserID="+str(df_zcfzidlist[i])+") and LevelID=6 or LevelID=5 ) and BPUserID="+str(df_zcfzidlist[i])+ " AND ZZSX="+        str(resultlevel[j])
        #print(sql)
        df1=pd.read_sql(sql,con=db)     
        num=df1["num"][0]
        zcfz_num.append(num)
        #print(len(xld_zcbz_num))
    df_zcfz[bmm_zcfz[j]]=zcfz_num   

for j in range(0,len(resultlevel)):
    zcfz_num=[]
    for i in range(0,len(df_zcfzidlist)):
    #print(i)
    #print(deptlist[i])
        sql="SELECT COUNT(*) as num  FROM qz_ldcykhinfo_"+code+" WHERE UserID IN (SELECT userID FROM userinformation WHERE DeptID in (select deptid from userinformation where UserID="+str(df_zcfzidlist[i])+") and LevelID=2 ) and BPUserID="+str(df_zcfzidlist[i])+ " AND ZZSX="+        str(resultlevel[j])
        #print(sql)
        df1=pd.read_sql(sql,con=db)     
        num=df1["num"][0]
        zcfz_num.append(num)
        #print(len(xld_zcbz_num))
    df_zcfz[zpf_zcfz[j]]=zcfz_num   


# In[50]:

dfxld=df_zcfz[["xld_0","xld_1","xld_2","xld_3"]]
dfzc=df_zcfz[["zc_0","zc_1","zc_2","zc_3"]]
dfbmm=df_zcfz[["bmm_0","bmm_1","bmm_2","bmm_3"]]
dfzpf=df_zcfz[["zpf_0","zpf_1","zpf_2","zpf_3"]]

xld_num=dfxld.apply(lambda x: x.sum(), axis=1)
df_zcfz["xld_num"]=xld_num
zc_num=dfzc.apply(lambda x: x.sum(), axis=1)
df_zcfz["zc_num"]=zc_num
bmm_num=dfbmm.apply(lambda x: x.sum(), axis=1)
df_zcfz["bmm_num"]=bmm_num
zpf_num=dfzpf.apply(lambda x: x.sum(), axis=1)
df_zcfz["zpf_num"]=zpf_num


# In[51]:

resultzcfz=(df_zcfz["xld_0"]/df_zcfz["xld_num"]*1.0+df_zcfz["xld_1"]/df_zcfz["xld_num"]*0.8+df_zcfz["xld_2"]/df_zcfz["xld_num"]*0.6+df_zcfz["xld_3"]/df_zcfz["xld_num"]*0.0)*20+ (df_zcfz["zc_0"]/df_zcfz["zc_num"]*1.0+df_zcfz["zc_1"]/df_zcfz["zc_num"]*0.8+df_zcfz["zc_2"]/df_zcfz["zc_num"]*0.6+df_zcfz["zc_3"]/df_zcfz["zc_num"]*0.0)*20+ (df_zcfz["bmm_0"]/df_zcfz["bmm_num"]*1.0+df_zcfz["bmm_1"]/df_zcfz["bmm_num"]*0.8+df_zcfz["bmm_2"]/df_zcfz["bmm_num"]*0.6+df_zcfz["bmm_3"]/df_zcfz["bmm_num"]*0.0)*40+(df_zcfz["zpf_0"]/df_zcfz["zpf_num"]*1.0+df_zcfz["zpf_1"]/df_zcfz["zpf_num"]*0.8+df_zcfz["zpf_2"]/df_zcfz["zpf_num"]*0.6+df_zcfz["zpf_3"]/df_zcfz["zpf_num"]*0.0)*10

df_zcfz["zcfz_result"]=resultzcfz


# In[52]:

zcfz_deptidlist=df_zcfz["DeptID"]
zcbz_result=df["zcbz_result"]
zcfz_deptidlist=np.array(zcfz_deptidlist)
#print(len(zcfz_deptidlist))
deptidlist=np.array(deptidlist)
#print(len(deptidlist))
zcfz_bzf=[]
for i in range(0, len(zcfz_deptidlist)):    
    for j in range(0,len(deptidlist)):      
        if(zcfz_deptidlist[i]==deptidlist[j]):
             
            #print("i is ",i,"and j is ",j,"--",zcfz_deptidlist[i],"/",deptidlist[j],"ok")
        #else:
            #print("i is ",i,"and j is ",j,"--",zcfz_deptidlist[i],"/",deptidlist[j],"error")
            bzf=zcbz_result[j]*0.1
            zcfz_bzf.append(bzf)
df_zcfz["zcfz_bzf"]=zcfz_bzf       
df_zcfz["zcfz_fr"]=df_zcfz["zcfz_bzf"]+df_zcfz["zcfz_result"]


# In[54]:

df1_zcfz=df_zcfz[["Account","UserName","DeptName", "zcfz_fr"]]
#df1_zcfz.to_sql(con=db, name='zcfz_result_'+code, if_exists='replace')
df1_zcfz.to_sql('zcfz_result_'+code, con=engine, if_exists='replace')


# In[ ]:
print("successed!");


