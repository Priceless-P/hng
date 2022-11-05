#!/usr/bin/python3
import pandas as pd
import hashlib


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
    re = df['Attributes- Hair. Eyes. Teeth. Clothing. Accessories. Expression. Strength. Weakness'].tolist()
    for item in re:

        res = item.split(', ')
        for i in res:
            j = i.split(':')

        df['attributes'] = pd.DataFrame(res, columns=['trait_type'])

    df['collection'] = df[['name', 'id', 'attributes']].to_dict('records')
    print(df[['format', 'name', 'description', 'minting_tool', 'sensitive_content',
              'series_number', 'series_total', 'attributes', 'collection']].to_json(json_file, orient='records',
                                                                                    indent=4))

    with open(json_file, 'rb') as f:
        for line in f:
            hashed_line = hashlib.sha256(line.rstrip()).hexdigest()
            hashed_list.append(hashed_line)

    with open(filename, 'r') as firstfile, open(new_file, 'w') as secondfile:

        for line in firstfile:
            secondfile.write(line)

        csv_input = pd.read_csv(filename)
        csv_input['Hash'] = csv_input['Name']
        csv_input.to_csv(new_file, index=False)


if __name__ == '__main__':
    welcome()
    compute_hash()
    print("Done! check your current folder for output")
