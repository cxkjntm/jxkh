from sqlalchemy import create_engine
import numpy as np
import pandas as pd
import pymysql

df = pd.DataFrame({'name' : ['User 1', 'User 2', 'User 3']})
print(df)
engine = create_engine("mysql+pymysql://root:123456@localhost/jxkh")
df.to_sql('users', con=engine)
print(engine.execute("SELECT * FROM users").fetchall())


df1 = pd.DataFrame({'name' : ['User 4', 'User 5']})
df1.to_sql('users', con=engine, if_exists='append')
print(engine.execute("SELECT * FROM users").fetchall())
df1.to_sql('users', con=engine, if_exists='replace',index_label='id')
print(engine.execute("SELECT * FROM users").fetchall())
