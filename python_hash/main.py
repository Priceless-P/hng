import hashlib
from itertools import zip_longest
import pandas as pd

hashed_list = []


def welcome():
    print('Hi, Which file do you want to compute?')


def compute_hash():
    filename = input("Filename: ")
    srt = '.csv'
    j = '.json'
    json_file = filename + j
    new_file = "output" + srt
    hashed_list = []

    df = pd.read_csv(filename)
    df['format'] = "CHIP_0007"
    df['name'] = df["Name"]
    df['description'] = df["Description"]
    df['minting_tool'] = ''
    df['sensitive_content'] = False
    df['series_number'] = df["Series Number"]
    df['series_total'] = len(df)
    df['gender'] = "gender"
    df['trait_type'] = df['gender']
    df['value'] = df["Gender"]
    df['id'] = df["UUID"]

    df['attributes'] = df[['trait_type', 'value']].to_dict('records')
    df['attribute'] = df[['trait_type', 'value']].to_dict('records')
    df['collection'] = df[['name', 'id', 'attribute']].to_dict('records')
    re = df['Attributes- Hair. Eyes. Teeth. Clothing. Accessories. Expression. Strength. Weakness'].tolist()
    for item in re:

        res = item.split(', ')
        for i in res:
            j = i.split(':')
            j = list(j)

            key = ['trait_type', 'value']
            d1 = zip_longest(key, j, fillvalue='trait_type')

            abb = pd.DataFrame(dict(d1), index=[0])
            pd.concat([df['attributes'], abb], ignore_index=True, axis=0)

    print(df[['format', 'name', 'description', 'minting_tool', 'sensitive_content',
              'series_number', 'series_total', 'attributes', 'collection']].to_json(json_file, orient='records',
                                                                                    indent=4))
    hashed_list.append(['hash'])
    with open(json_file, 'rb') as f:
        for line in f:
            hashed_line = hashlib.sha256(line.rstrip()).hexdigest()
            hashed_list.append(hashed_line)

    df = pd.read_csv(filename, index_col=[0])
    df["Hash"] = hashed_line
    df.replace("", inplace=True)
    df.dropna(how='all', axis=1, inplace=True)
    df.to_csv(new_file)


if __name__ == '__main__':
    welcome()
    compute_hash()
    print("Done! check your current folder for output")
