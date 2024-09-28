
const districtsData = {
    "AndraPradesh": ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Kadapa", "Krishna", "Kurnool", "Prakasam", "Nellore", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari"],
    "ArunachalPradesh": ["Anjaw", "Changlang", "Dibang Valley", "East Kameng", "East Siang", "Kra Daadi", "Kurung Kumey", "Lohit", "Longding", "Lower Dibang Valley", "Lower Subansiri", "Namsai", "Papum Pare", "Siang", "Tawang", "Tirap", "Upper Siang", "Upper Subansiri", "West Kameng", "West Siang", "Itanagar"],
    "Assam": ["Baksa", "Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo", "Chirang", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Goalpara", "Golaghat", "Hailakandi", "Hojai", "Jorhat", "Kamrup Metropolitan", "Kamrup (Rural)", "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur", "Majuli", "Morigaon", "Nagaon", "Nalbari", "Dima Hasao", "Sivasagar", "Sonitpur", "South Salmara Mankachar", "Tinsukia", "Udalguri", "West Karbi Anglong"],
    "Bihar": ["Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur", "Buxar", "Darbhanga", "East Champaran", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Kaimur", "Katihar", "Khagaria", "Kishanganj", "Lakhisarai", "Madhepura", "Madhubani", "Munger", "Muzaffarpur", "Nalanda", "Nawada", "Patna", "Purnia", "Rohtas", "Saharsa", "Samastipur", "Saran", "Sheikhpura", "Sheohar", "Sitamarhi", "Siwan", "Supaul", "Vaishali", "West Champaran"],
    "Chhattisgarh": ["Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bemetara", "Bijapur", "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Gariaband", "Janjgir Champa", "Jashpur", "Kabirdham", "Kanker", "Kondagaon", "Korba", "Koriya", "Mahasamund", "Mungeli", "Narayanpur", "Raigarh", "Raipur", "Rajnandgaon", "Sukma", "Surajpur", "Surguja"],
    "Goa": ["North Goa", "South Goa"],
    "Gujarat": ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Botad", "Chhota Udaipur", "Dahod", "Dang", "Devbhoomi Dwarka", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kheda", "Kutch", "Mahisagar", "Mehsana", "Morbi", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Vadodara", "Valsad"],
    "Haryana": ["Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram", "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Kurukshetra", "Mahendragarh", "Mewat", "Palwal", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat", "Yamunanagar"],
    "HimachalPradesh": ["Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu", "Lahaul Spiti", "Mandi", "Shimla", "Sirmaur", "Solan", "Una"],
    "JammuKashmir": ["Anantnag", "Bandipora", "Baramulla", "Budgam", "Doda", "Ganderbal", "Jammu", "Kargil", "Kathua", "Kishtwar", "Kulgam", "Kupwara", "Leh", "Poonch", "Pulwama", "Rajouri", "Ramban", "Reasi", "Samba", "Shopian", "Srinagar", "Udhampur"],
    "Jharkhand": ["Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribagh", "Jamtara", "Khunti", "Koderma", "Latehar", "Lohardaga", "Pakur", "Palamu", "Ramgarh", "Ranchi", "Sahebganj", "Seraikela Kharsawan", "Simdega", "West Singhbhum"],
    "Karnataka": ["Bagalkot", "Bangalore Rural", "Bangalore Urban", "Belgaum", "Bellary", "Bidar", "Vijayapura", "Chamarajanagar", "Chikkaballapur", "Chikkamagaluru", "Chitradurga", "Dakshina Kannada", "Davanagere", "Dharwad", "Gadag", "Gulbarga", "Hassan", "Haveri", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysore", "Raichur", "Ramanagara", "Shimoga", "Tumkur", "Udupi", "Uttara Kannada", "Yadgir"],
    "Kerala": ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam", "Kottayam", "Kozhikode", "Malappuram", "Palakkad", "Pathanamthitta", "Thiruvananthapuram", "Thrissur", "Wayanad"],
    "MadhyaPradesh": ["Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone", "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Panna", "Raisen", "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna",
        "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha"],
    "Maharashtra": ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai City", "Mumbai Suburban", "Nagpur", "Nanded", "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", "Pune", "Raigad", "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha", "Washim", "Yavatmal"],
    "Manipur": ["Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West", "Jiribam", "Kakching", "Kamjong", "Kangpokpi", "Noney", "Pherzawl", "Senapati", "Tamenglong", "Tengnoupal", "Thoubal", "Ukhrul"],
    "Meghalaya": ["East Garo Hills", "East Jaintia Hills", "East Khasi Hills", "North Garo Hills", "Ri Bhoi", "South Garo Hills", "South West Garo Hills", "South West Khasi Hills", "West Garo Hills", "West Jaintia Hills", "West Khasi Hills"],
    "Mizoram": ["Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip", "Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip"],
    "Nagaland": ["Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Peren", "Phek", "Tuensang", "Wokha", "Zunheboto"],
    "Odisha": ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack", "Debagarh", "Dhenkanal", "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara", "Kendujhar", "Khordha", "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Puri", "Rayagada", "Sambalpur", "Subarnapur", "Sundergarh"],
    "Punjab": ["Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka", "Firozpur", "Gurdaspur", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Mohali", "Muktsar", "Pathankot", "Patiala", "Rupnagar", "Sangrur", "Shaheed Bhagat Singh Nagar", "Tarn Taran"],
    "Rajasthan": ["Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bhilwara", "Bikaner", "Bundi", "Chittorgarh", "Churu", "Dausa", "Dholpur", "Dungarpur", "Ganganagar", "Hanumangarh", "Jaipur", "Jaisalmer", "Jalore", "Jhalawar", "Jhunjhunu", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh", "Rajsamand", "Sawai Madhopur", "Sikar", "Sirohi", "Tonk", "Udaipur"],
    "Sikkim": ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"],
    "TamilNadu": ["Ariyalur", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kanchipuram", "Kanyakumari", "Karur", "Krishnagiri", "Madurai", "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai", "Ramanathapuram", "Salem", "Sivaganga", "Thanjavur", "Theni", "Thoothukudi", "Tiruchirappalli", "Tirunelveli", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore", "Viluppuram", "Virudhunagar"],
    "Telangana": ["Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon", "Jayashankar", "Jogulamba", "Kamareddy", "Karimnagar", "Khammam", "Komaram Bheem", "Mahabubabad", "Mahbubnagar", "Mancherial", "Medak", "Medchal", "Nagarkurnool", "Nalgonda", "Nirmal", "Nizamabad", "Peddapalli", "Rajanna Sircilla", "Ranga Reddy", "Sangareddy", "Siddipet", "Suryapet", "Vikarabad", "Wanaparthy", "Warangal Rural", "Warangal Urban", "Yadadri Bhuvanagiri"],
    "Tripura": ["Dhalai", "Gomati", "Khowai", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"],
    "UttarPradesh": ["Agra", "Aligarh", "Allahabad", "Ambedkar Nagar", "Amethi", "Amroha", "Auraiya", "Azamgarh", "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda", "Barabanki", "Bareilly", "Basti", "Bhadohi", "Bijnor", "Budaun", "Bulandshahr", "Chandauli", "Chitrakoot", "Deoria", "Etah", "Etawah", "Faizabad", "Farrukhabad", "Fatehpur", "Firozabad", "Gautam Buddha Nagar", "Ghaziabad", "Ghazipur", "Gonda", "Gorakhpur", "Hamirpur", "Hapur", "Hardoi", "Hathras", "Jalaun", "Jaunpur", "Jhansi", "Kannauj", "Kanpur Dehat", "Kanpur Nagar", "Kasganj", "Kaushambi", "Kheri", "Kushinagar", "Lalitpur", "Lucknow", "Maharajganj", "Mahoba", "Mainpuri", "Mathura", "Mau", "Meerut", "Mirzapur", "Moradabad", "Muzaffarnagar", "Pilibhit", "Pratapgarh", "Raebareli", "Rampur", "Saharanpur", "Sambhal", "Sant Kabir Nagar", "Shahjahanpur", "Shamli", "Shravasti", "Siddharthnagar", "Sitapur", "Sonbhadra", "Sultanpur", "Unnao", "Varanasi"],
    "Uttarakhand": ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri", "Pithoragarh", "Rudraprayag", "Tehri", "Udham Singh Nagar", "Uttarkashi"],
    "WestBengal": ["Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur", "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata", "Malda", "Murshidabad", "Nadia", "North 24 Parganas", "Paschim Bardhaman", "Paschim Medinipur", "Purba Bardhaman", "Purba Medinipur", "Purulia", "South 24 Parganas", "Uttar Dinajpur"],
    "AndamanNicobar": ["Nicobar", "North Middle Andaman", "South Andaman"],
    "Chandigarh": ["Chandigarh"],
    "DadraHaveli": ["Dadra Nagar Haveli"],
    "DamanDiu": ["Daman", "Diu"],
    "Delhi": ["Central Delhi", "East Delhi", "New Delhi", "North Delhi", "North East Delhi", "North West Delhi", "Shahdara", "South Delhi", "South East Delhi", "South West Delhi", "West Delhi"],
    "Lakshadweep": ["Lakshadweep"],
    "Puducherry": ["Karaikal", "Mahe", "Puducherry", "Yanam"],

    // Add more districts for other states
};

function loadDistricts() {
    const stateSelect = document.getElementById("state");


    const districtSelect = document.getElementById("district");
    const selectedState = stateSelect.value;


    console.log(selectedState);

    // Clear previous options
    districtSelect.innerHTML = "<option value=''>Select District</option>";

    // Populate districts based on selected state
    districtsData[selectedState].forEach(district => {
        const option = document.createElement("option");
        option.value = district;
        option.text = district;
        districtSelect.appendChild(option);
    });

    // Trigger loading of sub-districts
    loadSubDistricts();
}

function loadSubDistricts() {
    const districtSelect = document.getElementById("district");
    const subdistrictSelect = document.getElementById("subdistrict");
    const selectedDistrict = districtSelect.value;

    // Clear previous options
    subdistrictSelect.innerHTML = "<option value=''>Select Sub-District</option>";

    // Fetch sub-districts based on selected district (you would do this with AJAX in a real application)
    // For now, let's use a hardcoded example
    const subDistrictsData = {


        //   all Maharashtra ------------------------------------------------------------------------------

        "Ahmednagar": ["Akola", "Jamkhed", "Karjat", "Kopargaon", "Nagar", "Nevasa", "Parner", "Pathardi", "Rahta", "Rahuri", "Sangamner", "Shevgaon", "Shrigonda", "Shrirampur"],

        "Akola": ["Akola", "Akot", "Balapur", "Barshitakli", "Murtijapur", "Patur", "Telhara"],

        "Amravati": ["Achalpur", "Amravati", "Anjangaon Surji", "Bhatkuli", "Chandur Railway", "Chandurbazar", "Chikhaldara", "Daryapur", "Dhamangaon Railway", "Dharni", "Morshi", "Nandgaon-Khandeshwar", "Teosa", "Warud"],

        "Aurangabad": ["Aurangabad", "Gangapur", "Kannad", "Khuldabad", "Paithan", "Phulambri", "Sillod", "Soegaon", "Vaijapur"],

        "Beed": ["Ambejogai", "Ashti", "Bid", "Dharur", "Georai", "Kaij", "Manjlegaon", "Parli", "Patoda", "Shirur", "Kasar", "Wadwani"],

        "Bhandara": ["Bhandara", "Mohadi", "Pauni", "Tumsar"],


        "Buldhana": ["Buldana", "Chikhli", "Deolgaon Raja", "Jalgaon (Jamod)", "Khamgaon", "Lonar", "Malkapur", "Mehkar", "Motala", "Nandura", "Sangrampur", "Shegaon", "Sindkhed Raja"],

        "Chandrapur": ["Ballarpur", "Bhadravati", "Brahmapuri", "Chandrapur", "Chimur", "Gondpipri", "Jiwati", "Korpana", "Mul", "Nagbhir", "Pombhurna", "Rajura", "Sawali", "Sindewahi", "Warora"],

        "Dhule": ["Dhule", "Sakri", "Shirpur", "Sindkhede"]
        ,


        "Gadchiroli": ["Aheri", "Armori", "Bhamragad", "Chamorshi", "Desaiganj (Vadasa)", "Dhanora", "Etapalli", "Gadchiroli", "Korchi", "Kurkheda", "Mulchera", "Sironcha"]
        ,


        "Gondia": ["Amgaon", "Arjuni Morgaon", "Deori", "Gondiya", "Goregaon", "Sadak-Arjuni", "Salekasa", "Tirora"]
        ,


        "Hingoli": ["Aundha (Nagnath)", "Basmath", "Hingoli", "Kalamnuri", "Sengaon"]
        ,


        "Jalgaon": ["Amalner", "Bhadgaon", "Bhusawal", "Bodvad", "Chalisgaon", "Chopda", "Dharangaon", "Erandol", "Jalgaon", "Jamner", "Muktainagar", "Pachora", "Parola", "Raver", "Yawal"]
        ,


        "Jalna": ["Ambad", "Badnapur", "Bhokardan", "Ghansawangi", "Jafferabad", "Jalna", "Mantha", "Partur"]
        ,

        "Kolhapur": ["Ajra", "Bavda", "Bhudargad", "Chandgad", "Gadhinglaj", "Hatkanangle", "Kagal", "Karvir", "Panhala", "Radhanagari", "Shahuwadi", "Shirol"]
        ,


        "Latur": ["Ahmadpur", "Ausa", "Chakur", "Deoni", "Jalkot", "Latur", "Nilanga", "Renapur", "Shirur-Anantpal", "Udgir"]
        ,

        "Mumbai Suburban": ["Andheri", "Borivali", "Kurla"]
        ,

        "Nagpur": ["Bhiwapur", "Hingna", "Kalameshwar", "Kamptee", "Katol", "Kuhi", "Mauda", "Nagpur (Rural)", "Nagpur (Urban)", "Narkhed", "Parseoni", "Ramtek", "Savner", "Umred"]
        ,


        "Nanded": ["Ardhapur", "Bhokar", "Biloli", "Deglur", "Dharmabad", "Hadgaon", "Himayatnagar", "Kandhar", "Kinwat", "Loha", "Mahoor", "Mudkhed", "Mukhed", "Naigaon (Khairgaon)", "Nanded", "Umri"]
        ,


        "Nandurbar": ["Akkalkuwa", "Akrani", "Nandurbar", "Nawapur", "Shahade", "Talode"]

        ,

        "Nashik": ["Baglan", "Chandvad", "Deola", "Dindori", "Igatpuri", "Kalwan", "Malegaon", "Nandgaon", "Nashik", "Niphad", "Peint", "Sinnar", "Surgana", "Trimbakeshwar", "Yevla"]
        ,
        "Osmanabad": ["Bhum", "Kalamb", "Lohara", "Osmanabad", "Paranda", "Tuljapur", "Umarga", "Washi"],

        "Parbhani": ["Gangakhed", "Jintur", "Manwath", "Palam", "Parbhani", "Pathri", "Purna", "Sailu", "Sonpeth"]
        ,
        "Pune": ["Ambegaon", "Baramati", "Bhor", "Daund", "Haveli", "Indapur", "Junnar", "Khed", "Mawal", "Mulshi", "Pune City", "Purandhar", "Shirur", "Velhe"]
        ,

        "Raigad": ["Alibag", "Karjat", "Khalapur", "Mahad", "Mangaon", "Mhasla", "Murud", "Panvel", "Pen", "Poladpur", "Roha", "Shrivardhan", "Sudhagad", "Tala", "Uran"]
        ,

        "Ratnagiri": ["Chiplun", "Dapoli", "Guhagar", "Khed", "Lanja", "Mandangad", "Rajapur", "Ratnagiri", "Sangameshwar"]
        ,

        "Sangli": ["Atpadi", "Jat", "Kadegaon", "Kavathemahankal", "Khanapur", "Miraj", "Palus", "Shirala", "Tasgaon", "Walwa"]
        ,

        "Satara": ["Jaoli", "Karad", "Khandala", "Khatav", "Koregaon", "Mahabaleshwar", "Man", "Patan", "Phaltan", "Satara", "Wai"]
        ,

        "Sindhudurg": ["Devgad", "Dodamarg", "Kankavli", "Kudal", "Malwan", "Sawantwadi", "Vaibhavvadi", "Vengurla"]
        ,

        "Solapur": ["Akkalkot", "Barshi", "Karmala", "Madha", "Malshiras", "Mangalvedhe", "Mohol", "Pandharpur", "Sangole", "Solapur North", "Solapur South"],

        "Thane": ["Ambarnath", "Bhiwandi", "Dahanu", "Jawhar", "Kalyan", "Mokhada", "Murbad", "Palghar", "Shahapur", "Talasari", "Thane", "Ulhasnagar", "Vada", "Vasai", "Vikramgad"]
        ,

        "Washim": ["Arvi", "Ashti", "Deoli", "Hinganghat", "Karanja", "Samudrapur", "Seloo", "Wardha"]
        ,

        "Washim": ["Karanja", "Malegaon", "Mangrulpir", "Manora", "Risod", "Washim"]
        ,

        "Yavatmal": ["Arni", "Babulgaon", "Darwha", "Digras", "Ghatanji", "Kalamb", "Kelapur", "Mahagaon", "Maregaon", "Ner", "Pusad", "Ralegaon", "Umarkhed", "Wani", "Yavatmal", "Zari-Jamani"],


        //-----------------------------------------------------------------------------------------------

        // tripuraa 

        "West Tripura": ["Agartala", "Bishalgarh", "Jirania", "Mohanpur", "Khowai"],
        "Sepahijala": ["Bishalgarh", "Jolaibari", "Kakraban", "Mandwai", "Rajnagar"],
        "Khowai": ["Khowai", "Teliamura", "Mungiakami"],
        "Gomati": ["Udaipur", "Rajnagar", "Bagma", "Amarpur", "Kakraban"],
        "South Tripura": ["Belonia", "Sabroom", "Bakafa", "Matarbari", "Rajnagar"],
        "Dhalai": ["Ambassa", "Manu", "Salema", "Gandacharra"],
        "North Tripura": ["Dharmanagar", "Kumarghat", "Kadamtala", "Kanchanpur"],
        "Unakoti": ["Kailasahar", "Dharmanagar", "Jampuijala", "Kumarghat"],

        //==========================================================================================================


        //Sikkim

        "East Sikkim": ["Gangtok", "Pakyong", "Rongli", "Rhenock"],
        "West Sikkim": ["Gyalshing (also spelled Geyzing)", "Yuksam"],
        "North Sikkim": ["Mangan", "Chungthang"],
        "South Sikkim": ["Namchi", "Ravong"],

        //========================================================================================================

        // Chandigarh
        "Chandigarh": ["Chandigarh"],

        //=============================================================================================================

        // Andra pradesh


        "Anantapur": ["Anantapur", "Dharmavaram", "Guntakal", "Hindupur", "Kadiri", "Kalyandurg", "Madakasira", "Nallamada", "Pamidi", "Roddam", "Settur", "Singanamala", "Tadpatri", "Vidapanakal"],


        "Chittoor": ["B.Kodur", "Chandragiri", "Chittoor", "Gangadhara Nellore", "Kalakada", "Kuppam", "Madanapalle", "Nagari", "Palamaner", "Penumuru", "Pileru", "Puttur", "Rajampet", "Ramachandrapuram", "Satyavedu", "Srikalahasti", "Thavanampalle", "Tirupati", "Yadamari"],


        "East Godavari": ["Addateegala", "Ainavilli", "Alamuru", "Allavaram", "Amalapuram", "Ambajipeta", "Anaparthy", "Atreyapuram", "Biccavolu", "Coringa", "Gandepalle", "Gangavaram", "Gokavaram", "Jaggampeta", "Kadiam", "Kajuluru", "Kakinada (Rural)", "Kakinada (Urban)", "Kapileswarapuram", "Karapa", "Katrenikona", "Kirlampudi", "Korukonda", "Kotananduru", "Kothapalle", "Mamidikuduru", "Mandapeta", "Maredumilli", "Mummidivaram", "Pedapudi", "Peddapuram", "Pithapuram", "Prathipadu", "Rajanagaram", "Rajavommangi", "Rajanagaram", "Rajavommangi", "Rajole", "Ramachandrapuram", "Rampachodavaram", "Rangampeta", "Ravulapalem", "Rayavaram", "Rowthulapudi", "Samalkota", "Sankhavaram", "Seethanagaram", "Thallarevu", "Thondangi", "Tuni", "Uppalaguptam", "Y. Ramavaram", "Yeleswaram"],


        "Guntur": ["Amaravathi", "Atchampet", "Bapatla", "Bellamkonda", "Bhattiprolu", "Chilakaluripet", "Dachepalle", "Duggirala", "Durgi", "Edlapadu", "Gurazala", "Kakumanu", "Karempudi", "Karlapalem", "Kollipara", "Krosuru", "Machavaram", "Macherla", "Mangalagiri", "Medikonduru", "Muppalla", "Nadendla", "Nagaram", "Nekarikallu", "Nizampatnam", "Parchur", "Pedakakani", "Pedakurapadu", "Pedanandipadu", "Phirangipuram", "Pittalavanipalem", "Ponnur", "Prathipadu", "Rajupalem", "Rentachintala", "Repalle", "Rompicherla", "Sattenapalle", "Savalyapuram", "Tadikonda", "Tenali", "Thullur", "Tsundur", "Vatticherukuru", "Veldurthi", "Vemuru", "Vinukonda", "Vundavalli"],


        "Krishna": ["Avanigadda", "Bantumilli", "Bapulapadu", "Challapalli", "Chatrai", "Gampalagudem", "Gannavaram", "Ghantasala", "Gudivada", "Gudlavalleru", "Ibrahimpatnam", "Jaggayyapeta", "Kaikalur", "Kanchika Cherla", "Kankipadu", "Koduru", "Kruthivennu", "Machilipatnam", "Mandavalli", "Mopidevi", "Movva", "Mudinepalle", "Musunuru", "Mylavaram", "Nagayalanka", "Nandigama", "Nandivada", "Nuzvid", "Pamarru", "Pamidimukkala", "Pedana", "Pedaparupudi", "Penamaluru", "Penuganchiprolu", "Reddigudem", "Thotlavalluru", "Tiruvuru", "Unguturu", "Veerullapadu", "Vijayawada (Urban)", "Vijayawada (Rural)", "Vissannapet", "Vuyyuru"],


        "Kurnool": ["Adoni", "Alur", "Aspari", "Atmakur", "Banaganapalle", "Bethamcherla", "Chagalamarri", "Chippagiri", "Dhone", "Dornipadu", "Gadivemula", "Gonegandla", "Gospadu", "Gudur", "Halaharvi", "Kallur", "Kodumur", "Kolimigundla", "Kosigi", "Kowthalam", "Krishnagiri", "Kurnool", "Maddikera (East)", "Mahalingpuram", "Mantralayam", "Nandavaram", "Nandyal", "Nandikotkur", "Nossam", "Owk", "Pagidyala", "Pamulapadu", "Panyam", "Pathikonda", "Peddakadubur", "Rudravaram", "Sanjamala", "Sirvel", "Tuggali", "Uyyalawada", "Veldurthi", "Yemmiganur"],


        "Prakasam": ["Addanki", "Ardhaveedu", "Ballikurava", "Bestavaripeta", "Chandra Sekhara Puram", "Chimakurthy", "Cumbum", "Darsi", "Donakonda", "Giddalur", "Gudluru", "Hanumanthunipadu", "Inkollu", "Janakavaram Panguluru", "Kandukur", "Kanigiri", "Karamchedu", "Komarolu", "Konakanamitla", "Kondapi", "Korisapadu", "Kotha Patnam", "Kurichedu", "Lingasamudram", "Maddipadu", "Markapur", "Marripudi", "Martur", "Mundlamuru", "Naguluppala Padu", "Ongole", "Pamur", "Parchur", "Pedacherlo Palle", "Podili", "Ponnaluru", "Pullalacheruvu", "Santhamaguluru", "Santhanuthalapadu", "Singarayakonda", "Tangutur", "Tarlapadu", "Thallur", "Tripuranthakam", "Ulavapadu", "Veligandla", "Vetapalem", "Voletivaripalem", "Yeddanapudi"],


        "Srikakulam": ["Amadalavalasa", "Bhamini", "Burja", "Etcherla", "Ganguvari Sigadam", "Gara", "Hiramandalam", "Ichchapuram", "Jalumuru", "Kanchili", "Kaviti", "Kotabommali", "Kothuru", "Laveru", "Mandasa", "Meilaputti", "Nandigam", "Narasannapeta", "Palakonda", "Pathapatnam", "Polaki", "Ponduru", "Rajam", "Santhabommali", "Santhakaviti", "Saravakota", "Sarubujjili", "Seethampeta", "Sompeta", "Srikakulam", "Tekkali", "Vajrapukothuru", "Vangara", "Veera Ragavapuram"],


        "Visakhapatnam": ["Anakapalle", "Anandapuram", "Ananthagiri", "Araku Valley", "Atchutapuram", "Bheemunipatnam", "Butchayyapeta", "Cheedikada", "Chintapalle", "Devarapalle", "Dumbriguda", "Gajuwaka", "Gangaraju Madugula", "Golugonda", "Gudem Kotha Veedhi", "Hukumpeta", "K.Kotapadu", "Kasimkota", "Kotauratla", "Koyyuru", "Madugula", "Makavarapalem", "Munchingiputtu", "Nakkapalli", "Narsipatnam", "Nathavaram", "Paderu", "Padmanabham", "Paravada", "Payakaraopeta", "Pedabayalu", "Pedagantyada", "Pendurthi", "Rambilli", "Ravikamatham", "Rolugunta", "S. Rayavaram", "Sabbavaram", "Visakhapatnam", "Visakhapatnam (Urban)", "Yelamanchili"],


        "Vizianagaram": ["Bhogapuram", "Bobbili", "Bondapalli", "Cheepurupalli", "Dattirajeru", "Denkada", "Gajapathinagaram", "Garividi", "Gummalakshmipuram", "Gurla", "Jami", "Jiyyammavalasa", "Komarada", "Kotauratla", "Kothavalasa", "Lakkavarapukota", "Makkuva", "Merakamudidam", "Nellimarla", "Pachipenta", "Parvathipuram", "Pusapatirega", "Ramabhadrapuram", "Salur", "Seethanagaram", "Srungavarapukota", "Therlam", "Vepada", "Vizianagaram"],


        "West Godavari": ["Akividu", "Attili", "Bhimavaram", "Bhimadole", "Chagallu", "Denduluru", "Devarapalle", "Dwaraka Tirumala", "Eluru", "Ganapavaram", "Gopalapuram", "Iragavaram", "Jangareddigudem", "Jeelugumilli", "Kalla", "Kamavarapukota", "Kovvur", "Koyyalagudem", "Kukunoor", "Nallajerla", "Narasapuram", "Nidadavole", "Nidamarru", "Palacole", "Palakoderu", "Pedapadu", "Pedavegi", "Peddavura", "Peravali", "Poduru", "Polavaram", "Tadepalligudem", "Tanuku", "Tundurru", "Undi", "Undrajavaram", "Unguturu", "Veeravasaram"],


        "Kadapa": ["Atlur", "Badvel", "Brahmamgarimattam", "Chakrayapet", "Chapadu", "Chennur", "Chinnamandem", "Chitvel", "Duvvur", "Galiveedu", "Jammalamadugu", "Kalasapadu", "Kamalapuram", "Khajipet", "Kondapuram", "Lingala", "Muddanur", "Mydukur", "Nandalur", "Obulavaripalle", "Peddamudium", "Porumamilla", "Proddutur", "Pulivendla", "Pullampeta", "Rajampet", "Ramapuram", "Rayachoti", "Sambepalle", "Sidhout", "Simhadripuram", "Vallur", "Veeraballe"],


        //==============================================================================================

        // 3. Puducherry

        "Puducherry": ["Puducherry Municipality", "Ozhukarai Municipality", "Villianur Commune", "Ariyankuppam Commune", "Mannadipet Commune", "Bahour Commune", "Nellithope Commune"],
        "Karaikal": ["Karaikal Municipality", "Karaikal South Commune", "Karaikal North Commune", "Karaikal Beach Commune", "Nedungadu Commune", "Thirunallar Commune", "Thirumalairayanpattinam Commune"],
        "Mahe": ["Mahe Municipality", "Palloor Commune", "Chalakara Commune"],
        "Yanam": ["Yanam Commune"],

        //=========================================================================================================

        //uttar pradesh

        "Agra": ["Agra", "Bah", "Etmadpur", "Fatehabad", "Fatehpur Sikri", "Kheragarh", "Kiraoli"],


        "Aligarh": ["Aligarh", "Atrauli", "Chharra", "Gabhana", "Iglas", "Jawan", "Koil", "Kher", "Khair"],


        "Allahabad": ["Allahabad", "Bara", "Handia", "Karchhana", "Koraon", "Meja", "Phulpur", "Soraon"],


        "Ambedkar Nagar": ["Akbarpur", "Baskhari", "Dhanpatganj", "Jalalpur", "Tanda"],


        "Amethi": ["Amethi", "Gauriganj", "Jagdishpur", "Musafirkhana"],


        "Amroha": ["Amroha", "Dhanaura", "Hasanpur", "Joya"],


        "Auraiya": ["Ajitmal", "Auraiya", "Bidhuna"],


        "Azamgarh": ["Azamgarh", "Bilariaganj", "Didarganj", "Gopalpur", "Mehnagar", "Nizamabad", "Phoolpur", "Sagri", "Tahbarpur"],


        "Badaun": ["Badaun", "Bilsi", "Dataganj", "Gunnaur", "Salarpur"],


        "Baghpat": ["Baghpat", "Baraut", "Khekra"],


        "Bahraich": ["Bahraich", "Kaiserganj", "Mahasi", "Matera", "Nanpara", "Payagpur", "Risia", "Shivpur"],


        "Ballia": ["Ballia", "Bansdih", "Belthara Road", "Rasra"],


        "Balrampur": ["Balrampur", "Gainsari", "Pachpedwa", "Tulsipur", "Utraula"],


        "Banda": ["Atarra", "Baberu", "Banda", "Naraini"],


        "Barabanki": ["Barabanki", "Fatehpur", "Haidergarh", "Ramsanehighat", "Sirauli Gauspur", "Suratganj", "Tehseel Tatri Bazaar"],


        "Bareilly": ["Aonla", "Bareilly", "Faridpur", "Meerganj", "Nawabganj"],


        "Basti": ["Basti", "Bhanpur", "Haraiya", "Kaptanganj", "Rudhauli", "Saltaua Gopalpur"],


        "Bhadohi": ["Aurai", "Gyanpur", "Rohaniya"],


        "Bijnor": ["Bijnor", "Chandpur", "Dhampur", "Nagina", "Najibabad"],


        "Budaun": ["Bilsi", "Budaun", "Dataganj", "Gunnaur", "Salarpur"],


        "Bulandshahr": ["Anupshahr", "Bulandshahr", "Danpur", "Khurja", "Siana", "Sikandrabad"],


        "Chandauli": ["Chakia", "Chandauli", "Mughalsarai", "Sakaldiha"],


        "Chitrakoot": ["Chitrakoot", "Karwi", "Manikpur", "Mau", "Ramnagar"],


        "Deoria": ["Baitalpur", "Barhaj", "Deoria", "Gauri Bazar", "Rudrapur", "Salempur", "Tarkulwa"],


        "Etah": ["Aliganj", "Awagarh", "Etah", "Jalesar", "Kasganj", "Marhara", "Patiyali"],


        "Etawah": ["Auraiya", "Bharthana", "Chakarnagar", "Etawah", "Jaswantnagar", "Saifai"],


        "Faizabad": ["Ayodhya", "Bikapur", "Faizabad", "Milkipur", "Rudauli", "Sohawal", "Tanda"],


        "Farrukhabad": ["Amritpur", "Bhojpur", "Fatehgarh", "Kaimganj", "Kampil", "Kayamganj", "Mohammadabad"],


        "Fatehpur": ["Bahuwa", "Bindki", "Fatehpur", "Hathgam"],


        "Firozabad": ["Firozabad", "Jasrana", "Shikohabad", "Tundla"],


        "Gautam Buddh Nagar": ["Dadri", "Gautam Buddh Nagar", "Jewar"],


        "Ghaziabad": ["Ghaziabad", "Hapur"],


        "Ghazipur": ["Ghazipur", "Jakhanian", "Jangipur", "Mohammadabad", "Saidpur"],


        "Gonda": ["Colonelganj", "Gonda", "Katra Bazar", "Mankapur", "Mundera Bazar", "Tarabganj", "Utraula"],


        "Gorakhpur": ["Bansgaon", "Bhathat", "Campierganj", "Chargawan", "Chauri Chaura", "Cuncolim", "Dhanghata", "Gola", "Gorakhpur", "Khajni", "Khorabar", "Kushinagar", "Pipraich", "Sahjanwa", "Sardarnagar"],


        "Hamirpur": ["Atarra", "Bijawar", "Charkhari", "Hamirpur", "Kadaura", "Kurara", "Maudaha", "Mohan"],


        "Hapur": ["Hapur", "Dhaulana", "Pilkhuwa"],


        "Hardoi": ["Balamau", "Behendar", "Hardoi", "Jahangirabad", "Majhila", "Sawayajpur", "Shahabad", "Sursa"],


        "Hathras": ["Hathras", "Sadabad", "Sasni", "Sikandra Rao"],


        "Jalaun": ["Jalaun", "Kalpi", "Konch", "Madhogarh"],


        "Jaunpur": ["Badlapur", "Jaunpur", "Kerakat", "Mariahu", "Mungra-Badshahpur", "Rampur", "Sujanganj"],


        "Jhansi": ["Baragaon", "Chirgaon", "Garautha", "Jhansi", "Lalitpur", "Madhogarh", "Mauranipur", "Mohta"],


        "Kannauj": ["Chhibramau", "Gughrapur", "Kannauj", "Saurikh", "Tirwa"],


        "Kanpur Dehat": ["Akbarpur", "Amraudha", "Bhognipur", "Derapur", "Rasulabad"],


        "Kanpur Nagar": ["Bilhaur", "Ghatampur", "Kanpur", "Sikandra"],


        "Kanshi Ram Nagar": ["Bharthana", "Chhibramau", "Indergarh", "Kaimganj", "Kasganj"],


        "Kaushambi": ["Chail", "Manjhanpur", "Newada", "Sirathu"],


        "Kushinagar": ["Hata", "Kasya", "Khadda", "Padrauna", "Tamkuhi Raj"],


        "Lakhimpur Kheri": ["Dhaurahra", "Gola Gokarannath", "Kasta", "Lakhimpur", "Mailani", "Mitauli", "Nighasan", "Palia Kalan", "Ramia Behar", "Singahi Bhiraura", "Utraula"],


        "Lalitpur": ["Lalitpur", "Mahroni", "Talbehat"],


        "Lucknow": ["Bakshi Ka Talab", "Gosainganj", "Lucknow", "Malihabad"],


        "Maharajganj": ["Bridgemanganj", "Ekona", "Maharajganj", "Nautanwa", "Nichlaul", "Pharenda", "Siswa Bazar"],


        "Mahoba": ["Charkhari", "Kulpahar", "Mahoba"],


        "Mainpuri": ["Bhogaon", "Karhal", "Mainpuri"],


        "Mathura": ["Chhata", "Mahavan", "Mant", "Mat", "Mathura", "Nandgaon"],


        "Mau": ["Badraon", "Chakia", "Mohammadabad Gohna", "Ratanpura"],


        "Meerut": ["Baghpat", "Khekra", "Meerut", "Mawana", "Sardhana"],


        "Mirzapur": ["Chunar", "Lalganj", "Marihan", "Mirzapur", "Vindhyachal"],


        "Moradabad": ["Bilari", "Chandausi", "Kanth", "Moradabad", "Thakurdwara"],


        "Muzaffarnagar": ["Baghpat", "Khekra", "Meerut", "Muzaffarnagar"],


        "Pilibhit": ["Bilsanda", "Jahanabad", "Pilibhit", "Puranpur", "Safipur"],


        "Pratapgarh": ["Antu", "Bela", "Kunda", "Lalganj", "Patti", "Raniganj", "Zaidpur"],


        "Rae Bareli": ["Dalmau", "Lalganj", "Rae Bareli", "Sareni", "Unchahar"],


        "Rampur": ["Bilaspur", "Milak", "Rampur", "Shahabad", "Suar", "Sultanpur"],


        "Saharanpur": ["Behat", "Deoband", "Nakur", "Saharanpur"],


        "Sambhal": ["Asmoli", "Bahjoi", "Chandausi", "Gunnaur", "Sambhal"],


        "Sant Kabir Nagar": ["Ghanghata", "Khalilabad", "Maghar"],


        "Shahjahanpur": ["Jalalabad", "Khutar", "Powayan", "Shahjahanpur", "Tilhar"],


        "Shamli": ["Kairana", "Shamli"],


        "Shrawasti": ["Bhinga", "Ikauna", "Shrawasti", "Tulsipur"],


        "Siddharthnagar": ["Bansi", "Barhani Bazar", "Domariaganj", "Itwa", "Khesraha", "Kudaraha", "Nayaghat", "Shohratgarh", "Uska Bazar"],


        "Sitapur": ["Biswan", "Laharpur", "Maholi", "Mihinpurwa", "Misrikh", "Mohanlalganj", "Pahala", "Sidhauli", "Sitrauli", "Tambaur-cum-Ahmadabad"],


        "Sonbhadra": ["Anpara", "Babhani", "Behari", "Chunar", "Dudhi", "Ghorawal", "Jamania", "Kone", "Myorpur", "Nagwa", "Pipri", "Renukut", "Robertsganj", "Sonbhadra"],


        "Sultanpur": ["Amethi", "Dhanpatganj", "Gauriganj", "Isauli", "Jaisinghpur", "Kadipur", "Karaundi", "Lambhua", "Musafirkhana", "Pandeykalan", "Purabazar", "Sadar", "Shahi"],


        "Unnao": ["Bangarmau", "Bighapur", "Gangaghat", "Hasanganj", "Purwa", "Safipur", "Unnao"],


        "Varanasi": ["Pindra", "Rohaniya", "Sevapuri", "Varanasi"],



        //=====================================================================================================

        // Odisha


"Angul" : ["Angul", "Athmallik", "Kishorenagar", "Pallahara", "Talcher"],
"Balangir" : ["Balangir", "Belpada", "Khaprakhol", "Loisingha", "Patnagarh", "Titlagarh", "Tushura"],
"Balasore" : ["Balasore", "Baliapal", "Basta", "Bhograi", "Jaleswar", "Rasgovindpur", "Remuna", "Soro"],
"Bargarh" : ["Bargarh", "Attabira", "Barapali", "Bhatli", "Padampur", "Sohela"],
"Bhadrak" : ["Bhadrak", "Bansada", "Basudebpur", "Bonth", "Dhamnagar", "Tihidi"],
"Cuttack" : ["Cuttack", "Athagarh", "Badamba", "Banki", "Mahanga", "Narasinghpur", "Nischintakoili", "Salepur", "Tangi"],
"Deogarh" : ["Deogarh", "Barkote", "Reamal"],
"Dhenkanal" : ["Dhenkanal", "Gandia", "Hindol", "Kamakshyanagar", "Parjang"],
"Gajapati" : ["Gajapati", "Kashinagar", "Mohanpur", "Paralakhemundi", "Ramagiri", "Rayagada"],
"Ganjam" : ["Berhampur", "Aska", "Bhanjanagar", "Brahmapur", "Chatrapur", "Chikiti", "Digapahandi", "Gopalpur", "Hinjilicut", "Jagannathprasad", "Kabisuryanagar", "Khalikote", "Kodala", "Kukudakhandi", "Patapur", "Purusottampur", "Rambha"],
"Jagatsinghpur" : ["Jagatsinghpur", "Balikuda", "Biridi", "Erasama", "Kujang", "Naugaon", "Paradip"],
"Jajpur" : ["Jajpur", "Badachana", "Binjharpur", "Dharmasala", "Jakhapura", "Korai", "Kuakhia"],
"Jharsuguda" : ["Jharsuguda", "Banaharapali", "Belpahar", "Brajarajnagar", "Kolabira", "Lakhanpur", "Laikera"],
"Kalahandi" : ["Kalahandi", "Bhawanipatna", "Dharamgarh", "Jayapatna", "Junagarh", "Kesinga"],
"Kandhamal" : ["Kandhamal", "Baliguda", "Boudh", "Chakapad", "Daringibadi", "Kantamal", "Khajuripada", "Nuagaon", "Phiringia", "Phulbani", "Raikia", "Tikabali", "Tumudibandh"],
"Kendrapara" : ["Kendrapara", "Aul", "Rajnagar", "Pattamundai", "Marsaghai", "Garadpur", "Mahakalapada", "Kanika"],
"Kendujhar (Keonjhar)" : ["Kendujhar", "Anandapur", "Champua", "Ghatgaon", "Harichandanpur", "Jhumpura", "Keonjhar", "Khacharposi", "Pandapara", "Patna"],
"Khordha" : ["Khordha", "Balianta","Balipatna"],

/////////////////////////////////////////////////////////////----------------------------------------------------

//panjab


"Amritsar": ["Amritsar East", "Amritsar West", "Ajnala", "Tarn Taran"],
"Barnala": ["Barnala", "Tapa"],
"Bathinda": ["Bathinda", "Bathinda Rural", "Rampura Phul", "Maur", "Talwandi Sabo"],
"Faridkot" : ["Faridkot", "Kotkapura", "Jaito"],
"Fatehgarh Sahib": ["Amloh", "Bassi Pathana", "Fatehgarh Sahib"],
"Fazilka" : ["Fazilka", "Abohar"],
"Ferozepur" : ["Ferozepur", "Ferozepur Cantt.", "Zira", "Makhu"],
"Gurdaspur": ["Gurdaspur", "Batala", "Dera Baba Nanak", "Pathankot"],
"Hoshiarpur" : ["Hoshiarpur", "Dasua", "Mukerian", "Tanda"],
"Jalandhar": ["Jalandhar East", "Jalandhar West", "Nakodar", "Phillaur"],
"Kapurthala": ["Kapurthala", "Phagwara", "Sultanpur Lodhi"],
"Ludhiana" : ["Ludhiana East", "Ludhiana West", "Jagraon", "Khanna", "Samrala", "Payal", "Raikot"],
"Mansa": ["Mansa", "Budhlada"],
"Moga" : ["Moga", "Bagha Purana", "Nihal Singhwala"],
"Pathankot" : ["Pathankot", "Sujanpur"],
"Patiala" : ["Patiala", "Rajpura", "Nabha", "Samana", "Ghanaur", "Dera Bassi"],
"Rupnagar (Ropar)" : ["Rupnagar", "Anandpur Sahib", "Morinda", "Nurpur Bedi", "Chamkaur Sahib"],
"Sahibzada Ajit Singh Nagar (Mohali)" : ["Mohali", "Kharar"],
"Sangrur" : ["Sangrur", "Sunam", "Dhuri", "Malerkotla"],
"Tarn Taran" : ["Tarn,Taran"],

//--------------------------------------------------------------------------------------------------------

  //bihar

  "Araria": ["Araria", "Bhargama", "Forbesganj", "Jokihat", "Kursakanta", "Narpatganj", "Palasi"],


 "Arwal": ["Arwal", "Karpi", "Kaler", "Kurtha"],


 "Aurangabad": ["Aurangabad", "Barun", "Daudnagar", "Deo", "Dum", "Goh", "Kutumba", "Madanpur", "Nabinagar", "Obra", "Rafiganj", "Haspura"],


 "Banka": ["Amarpur", "Banka", "Barahat", "Bausi", "Belhar", "Chanan", "Dhuraiya", "Phulidumar", "Rajaun"],


 "Begusarai": ["Bachhwara", "Bakhri", "Balia", "Begusarai", "Bhagwanpur", "Cheria Bariarpur", "Chorahi", "Haraiya", "Khudabandpur", "Matihani", "Sahebpur Kamal", "Teghra"],


 "Bhagalpur": ["Bhagalpur", "Colgong", "Gopalpur", "Ismailpur", "Jagdishpur", "Kahalgaon", "Kharik", "Narainpur", "Naugachhia", "Nathnagar", "Pirpainti", "Sabour", "Shahkund", "Sultanganj", "Sultanganj (Community Development Block)", "Rangra Chowk"],


 "Bhojpur": ["Ara", "Agiaon", "Barhara", "Behea", "Charpokhari", "Garhani", "Jagdishpur", "Koilwar", "Piro", "Sahar"],


 "Buxar": ["Buxar", "Chaugain", "Chausa", "Dumraon", "Itarhi", "Kesath", "Nawanagar"],


 "Darbhanga": ["Alinagar", "Bahadurpur", "Baheri", "Benipur", "Biraul", "Darbhanga", "Ghanshyampur", "Hanuman Nagar", "Hayaghat", "Jale", "Keotiranway", "Kiratpur", "Kusheshwar Asthan", "Manigachhi", "Singhwara", "Tardih"],


 "East Champaran": ["Adapur", "Areraj", "Banjariya", "Bankatwa", "Chakia", "Dhaka", "Harsidhi", "Jalalpur", "Kalyanpur", "Kesaria", "Kotwa", "Mehsi", "Motihari", "Paharpur", "Pakri Dayal", "Patahi", "Phenhara", "Raxaul", "Raghunathpur", "Sangrampur", "Turkaulia"],


 "Gaya": ["Atri", "Barachatti", "Belaganj", "Bodh Gaya", "Dobhi", "Dumaria", "Fatehpur", "Gaya", "Guraru", "Imamganj", "Khizirsarai", "Manpur", "Mohanpur", "Paraiya", "Sherghati", "Tikari"],


 "Gopalganj": ["Baikunthpur", "Barauli", "Bijaipur", "Dewapur", "Gopalganj", "Hasan Pura", "Kataiya", "Kuchaikote", "Manjha", "Mushahari", "Thawe", "Uchkagaon"],


 "Jamui": ["Aliganj", "Barhat", "Chakai", "Gidhaur", "Gopalpur", "Islamnagar Aliganj", "Jamui", "Jhajha", "Khaira", "Lakshmipur", "Sikandra", "Sono"],


 "Jehanabad": ["Arwal", "Ghoshi", "Hulasganj", "Jehanabad", "Kako", "Karahdih", "Makhdumpur", "Modanganj", "Nadar Ganj", "Ratni Faridpur"],


 "Kaimur": ["Adhaura", "Bhabua", "Bhabua Road", "Chainpur", "Chand", "Durgawati", "Kudra", "Mohania", "Nuaon", "Ramgarh", "Rampur", "Rohitas", "Sono"],


 "Katihar": ["Amdabad", "Azamnagar", "Balrampur", "Barari", "Barsoi", "Dandkhora", "Falka", "Hasanganj", "Kadwa", "Katihar", "Korha", "Kursela", "Labha", "Mansahi", "Mitarshi", "Pranpur", "Sameli", "Semaria", "Barari (Community Development Block)", "Barsoi (Community Development Block)"],


 "Khagaria": ["Alauli", "Bakhri", "Chautham", "Gogri", "Khagaria", "Mansi"],


 "Kishanganj": ["Bahadurganj", "Dighalbank", "Kishanganj", "Kochadhamin", "Pothia", "Terhagachh", "Thakurganj"],


 "Lakhisarai": ["Barahiya", "Halsi", "Kabrai", "Lakhisarai", "Pipariya"],


 "Madhepura": ["Alamnagar", "Bihariganj", "Chausa", "Gamhariya", "Ghailarh", "Kumarkhand", "Madhepura", "Murliganj", "Puraini", "Shankarpur", "Singheshwar"],


 "Madhubani": ["Andhratharhi", "Babubarhi", "Benipatti", "Bisfi", "Bisfi", "Bisfi", "Donaupur", "Jainagar", "Jhanjharpur", "Kaluahi", "Khajauli", "Lakhnaur", "Laukaha", "Laukahi", "Madhepur", "Madhubani", "Madhwapur", "Pandaul", "Phulparas", "Rajnagar", "Sakri", "Shahpur", "Sindhwalia"],


 "Munger": ["Asarganj", "Bariarpur", "Belhara", "Dharhara", "Jamalpur", "Kharagpur", "Munger", "Sangrampur", "Tarapur", "Tetiha Bariarpur"],


 "Muzaffarpur": ["Aurai", "Bandra", "Baruraj", "Bochaha", "Dholi", "Gaighat", "Kanti", "Katra", "Kurhani", "Marwan", "Minapur", "Musahri", "Muzaffarpur", "Paroo", "Sahebganj"],


 "Nalanda": ["Asthawan", "Ben", "Bihar Sharif", "Bind", "Chandi", "Ekangarsarai", "Giriak", "Haildarnagar", "Harnaut", "Islampur", "Karai Parsurai", "Katrisarai", "Nagar Nausa", "Noorsarai", "Parbalpur", "Rahui", "Rahui Parsurai", "Sarmera", "Silao", "Tharthari"],


 "Nawada": ["Akbarpur", "Hisua", "Kashi Chak", "Kawakol", "Meskaur", "Nardiganj", "Nawada", "Pakribarawan", "Roh", "Sirdala", "Warisaliganj"],


 "Patna": ["Athmalgola", "Bakhtiarpur", "Barh", "Belchhi", "Bihta", "Bikram", "Daniawan", "Dhanarua", "Dinapur", "Dulhin Bazar", "Fatwah", "Khusrupur", "Maner", "Masaurhi", "Mokameh", "Naubatpur", "Paliganj", "Pandarak", "Patna", "Phulwari", "Punpun"],


 "Purnia": ["Amour", "Baisa", "Banmankhi", "Barhara", "Bhawanipur", "Dagarua", "Dhamdaha", "Jalalgarh", "Jalalpur", "Kasba", "Krityanand Nagar", "Rupauli", "Srinagar", "Srinagar (Community Development Block)", "Baisa (Community Development Block)", "Barhara (Community Development Block)"],


 "Rohtas": ["Akorhi Gola", "Banjari", "Bikramganj", "Chenari", "Dawath", "Dehri", "Kargahar", "Karakat", "Nauhatta", "Nokha", "Rohtas", "Sanjhauli", "Sheosagar", "Suryapura"],


 "Saharsa": ["Banma Itahri", "Kahra", "Mahishi", "Nauhatta", "Patarghat", "Salkhua", "Sonbarsa", "Sour Bazar"],


 "Samastipur": ["Bibhutpur", "Dalsinghsarai", "Hasanpur", "Kalyanpur", "Khanpur", "Mohiuddin Nagar", "Mohanpur", "Patori", "Rosera", "Samastipur", "Sarairanjan", "Shivaji Nagar", "Singhia", "Tajpur", "Ujiyarpur", "Vidyapati Nagar"],


 "Saran": ["Amnour", "Baniapur", "Chapra", "Dariapur", "Dighwara", "Ishupur", "Jalalpur", "Lahladpur", "Maker", "Manjhi", "Marhaurah", "Mashrakh", "Nagra", "Panapur", "Parsa", "Revelganj", "Taraiya"],


 "Sheikhpura": ["Ariari", "Barbigha", "Chewara", "Ghat Kusumbha", "Karande", "Malam-Na-Pachrukhi", "Nawada", "Nawada", "Sheikhpura", "Shekhopur Sarai"],


 "Sheohar": ["Bairgania", "Bajpatti", "Bathanaha", "Dumari Katsari", "Piprahi"],


 "Sitamarhi": ["Bairgania", "Belsand", "Bhitaha", "Dumra", "Majorganj", "Nanpur", "Paroo", "Parsauni", "Pupri", "Riga", "Runisaidpur", "Sonbarsa", "Suppi"],


 "Siwan": ["Andar", "Barharia", "Basantpur", "Bhagwanpur Hat", "Darauli", "Daraundha", "Goriakothi", "Guthani", "Hasanpura", "Hussainganj", "Lakri Nabiganj", "Maharajganj", "Mairwa", "Nautan", "Pachrukhi", "Pakri Dayal", "Raghunathpur", "Sadar", "Siwan", "Ziradei"],


 "Supaul": ["Basantpur", "Birpur", "Chhatapur", "Daraundha", "Karja", "Kishanpur", "Nirmali", "Pratapganj", "Purab Sarai", "Raghopur", "Saraigarh Bhaptiyahi", "Saraigarh Bhaptiyahi (Community Development Block)", "Triveniganj"],


 "Vaishali": ["Bidupur", "Chehra Kalan", "Desri", "Goraul", "Hajipur", "Jandaha", "Lalganj", "Mahnar", "Mahua", "Patepur", "Patepur (Community Development Block)", "Raghopur", "Raja Pakar"],


 "West Champaran": ["Bagaha", "Bairiya", "Bettiah", "Bhitaha", "Chanpatia", "Gaunaha", "Jogapatti", "Lauriya", "Madhubani", "Mainatanr", "Majhaulia", "Narkatiaganj", "Nautan", "Ramnagar", "Sidhawalia"],


//-----------------------------------------------------------------------------------------------------

//Aasam

 "Baksa": ["Baksa"] ,
  "Barpeta": ["Barpeta", "Bajali"]
  ,
  "Biswanath": ["Biswanath"]
  ,
  "Bongaigaon": ["Bongaigaon"]
  ,
  "Cachar": ["Silchar", "Lakhipur", "Sonai", "Katigorah"]
  ,
  "Charaideo": ["Charaideo"]
  ,
  "Chirang": ["Chirang"]
  ,
  "Darrang": ["Mangaldoi", "Sipajhar", "Dalgaon-Sialmari"]
  ,
  "Dhemaji": ["Dhemaji", "Jonai"]
  ,
  "Dhubri": ["Dhubri", "Bilasipara"]
  ,
  "Dibrugarh": ["Dibrugarh", "Tingkhong"]
  ,
  "Dima Hasao": ["Haflong"]
  ,
  "Goalpara": ["Goalpara", "Balijana"]
  ,
  "Golaghat": ["Golaghat"]
  ,
  "Hailakandi": ["Hailakandi", "Lala"]
  ,
  "Hojai": ["Hojai"]
  ,
  "Jorhat": ["Jorhat"]
  ,
  "Kamrup": ["Guwahati", "Sualkuchi", "Hajo", "Chamaria", "Kamalpur"]
  ,
  "Kamrup Metropolitan": ["Guwahati (East)", "Guwahati (West)"]
  ,
  "Karbi Anglong": ["Diphu"]
  ,
  "Karimganj": ["Karimganj", "Badarpur"]
  ,
  "Kokrajhar": ["Kokrajhar"]
  ,
  "Lakhimpur": ["Lakhimpur", "Dhakuakhana"]
  ,
  "Majuli": ["Majuli"]
  ,
  "Morigaon": ["Morigaon"]
  ,
  "Nagaon": ["Nagaon", "Doboka", "Hojai"]
  ,
  "Nalbari": ["Nalbari"]
  ,
  "Sivasagar": ["Sivasagar", "Amguri"]
  ,
  "Sonitpur": ["Tezpur", "Gohpur", "Biswanath Chariali"],

  "South Salmara-Mankachar": ["South Salmara", "Mankachar"],

  "Tinsukia": ["Tinsukia", "Doom Dooma"],

  "Udalguri": ["Udalguri"],

  "West Karbi Anglong":["Bokajan"],


  //goa ---------------------------------------------------------------------------------------------------

  "South Goa": ["Margao","Mormugao","Quepem","Salcete","Sanguem"],

  "North Goa": ["Bardez", "Bicholim", "Pernem", "Sattari", "Tiswadi"],


//----------------------------------------------------------------------------------------------------------

     //arunachalpradesh

     "Tawang": ["Tawang", "Lumla", "Jang"],
  
  
     "West Kameng": ["Bomdila", "Dirang", "Kalaktang"],
  
  
     "East Kameng": ["Seppa", "Chayang Tajo", "Bameng"],
  
  
     "Papum Pare": ["Yupia", "Sagalee", "Balijan"],
  
  
     "Kurung Kumey": ["Koloriang", "Palin"],
  
  
     "Kra Daadi": [], // Subdistrict information not available
  
  
     "Lower Subansiri": ["Ziro", "Yachuli", "Dollungmukh"],
  
  
     "Upper Subansiri": ["Daporijo", "Dumporijo", "Raga"],
  
  
     "West Siang": ["Along", "Liromoba", "Tirbin"],
  
  
     "East Siang": ["Pasighat", "Mebo", "Ruksin"],
  
  
     "Siang": [], // Subdistrict information not available
  
  
     "Upper Siang": ["Yingkiong", "Mariyang", "Geku"],
  
  
     "Dibang Valley": ["Anini", "Roing"],
  
  
     "Lower Dibang Valley": ["Roing", "Dambuk", "Anini"],
  
  
     "Anjaw": ["Hayuliang", "Manchal"],
  
  
     "Lohit": ["Tezu", "Wakro", "Chowkham"],
  
  
     "Namsai": ["Namsai", "Chongkham", "Lathao"],
  
  
     "Changlang": ["Changlang", "Khimiyong", "Bordumsa"],
  
  
     "Tirap": ["Khonsa", "Deomali", "Soha"],
  
  
     "Longding": ["Longding", "Pumao", "Kanubari"],


     //-------------------------------------------------------------------------------------------------

     //hariyan

     "Ambala" : ["Ambala", "Barara", "Naraingarh"]
   ,
  "Bhiwani" : ["Bhiwani", "Loharu", "Siwani"]
   ,
  "Faridabad" : ["Faridabad", "Ballabgarh"]
   ,
  "Fatehabad" : ["Fatehabad", "Ratia"]
   ,
  "Gurgaon" : ["Gurgaon", "Pataudi", "Sohna"]
   ,
  "Hisar" : ["Hisar", "Adampur", "Narnaund"]
   ,
  "Jhajjar" : ["Jhajjar", "Bahadurgarh"]
   ,
  "Jind" : ["Jind", "Safidon", "Uchana"]
   ,
  "Kaithal" : ["Kaithal", "Guhla"]
   ,
  "Karnal" : ["Karnal", "Indri"]
   ,
  "Kurukshetra" : ["Kurukshetra", "Pehowa", "Shahabad"]
   ,
  "Mahendragarh" : ["Narnaul", "Mahendragarh", "Ateli Nangal"]
   ,
  "Palwal" : ["Palwal", "Hodal"]
   ,
  "Panchkula" : ["Panchkula", "Kalka", "Pinjore"]
   ,
  "Panipat" : ["Panipat", "Samalkha"]
   ,
  "Rewari" : ["Rewari", "Bawal", "Kosli"]
   ,
  "Rohtak" : ["Rohtak", "Meham", "Kharkhoda"]
   ,
  "Sirsa" : ["Sirsa", "Ellenabad", "Dabwali"]
   ,
  "Sonipat" : ["Sonipat", "Ganaur", "Gohana"]
   ,
  "Yamunanagar" : ["Yamunanagar", "Jagadhri"],
   

  //--------------------------------------------------------------------------------------------

//   8. Gujrat
  
  "Ahmedabad": ["Ahmedabad City", "Daskroi", "Detroj-Rampura", "Sanand", "Viramgam", "Barwala"]
  ,
 "Amreli": ["Amreli", "Babra", "Bagasara", "Dhari", "Kunkavav Vadia", "Lathi", "Savar Kundla"]
  ,
 "Anand": ["Anand", "Anklav", "Borsad", "Khambhat", "Petlad", "Sojitra", "Tarapur", "Umreth"]
  ,
 "Aravalli": ["Modasa", "Bhiloda", "Dhansura", "Malpur", "Meghraj", "Talod"]
  ,
 "Banaskantha": ["Palanpur", "Amirgadh", "Bhabhar", "Deesa", "Dhanera", "Kankrej", "Tharad", "Vav"]
  ,
 "Bharuch": ["Bharuch", "Ankleshwar", "Amod", "Jambusar", "Jhagadia", "Valia"]
  ,
 "Bhavnagar": ["Bhavnagar", "Botad", "Gadhada", "Gariadhar", "Ghogha", "Mahuva", "Palitana", "Sihor", "Talaja", "Umrala"]
  ,
 "Botad": ["Botad", "Barwala", "Gadhada", "Ranpur", "Vallabhipur"]
  ,
 "Chhota Udaipur": ["Chhota Udaipur", "Bodeli", "Jetpur Pavi", "Kavant", "Nasvadi", "Sankheda", "Savli"]
  ,
 "Dahod": ["Dahod", "Devgadbaria", "Dhanpur", "Fatepura", "Garbada", "Jhalod", "Limkheda", "Megalpur", "Morwa (Hadaf)", "Zalod"]
  ,
 "Dang": ["Ahwa", "Subir"]
  ,
 "Devbhoomi Dwarka": ["Khambhalia", "Kalyanpur", "Dwarka", "Bhanvad", "Okha", "Jamnagar Rural"]
  ,
 "Gandhinagar": ["Gandhinagar", "Dehgam", "Kalol", "Mansa"]
  ,
 "Gir Somnath": ["Veraval", "Kodinar", "Sutrapada", "Una", "Talala", "Gir Gadhada"]
  ,
 "Jamnagar": ["Jamnagar", "Dwarka", "Jodiya", "Jamkhambhalia", "Lalpur"]
  ,
 "Junagadh": ["Junagadh", "Mendarda", "Manavadar", "Keshod", "Vanthali", "Visavadar"]
  ,
 "Kheda": ["Nadiad", "Kheda", "Kapadvanj", "Mehmedabad", "Mahudha", "Thasra", "Balasinor", "Kathlal"]
  ,
 "Kutch": ["Bhuj", "Anjar", "Bhachau", "Gandhidham", "Mundra"],

  //--------------------------------------------------------------------------------------------

  //Jammu
  "Jammu": ["Jammu", "Akhnoor", "R.S. Pura"],
   "Srinagar" : ["Srinagar", "Ganderbal"],
   "Baramulla" : ["Baramulla", "Sopore", "Pattan"],
   "Anantnag" : ["Anantnag", "Kulgam", "Pulwama"],
   "Kupwara" : ["Kupwara", "Handwara", "Langate"],
   "Udhampur" : ["Udhampur", "Chenani"],
   "Poonch" : ["Poonch", "Mendhar", "Surankote"],
   "Rajouri" : ["Rajouri", "Nowshera", "Sunderbani"],
   "Kathua" : ["Kathua", "Hiranagar", "Basohli"],
   "Doda" : ["Doda", "Bhaderwah", "Kishtwar"],
   "Ramban" : ["Ramban", "Banihal", "Gool"],
   "Reasi" : ["Reasi", "Pouni", "Gool Arnas"],
   "Kishtwar" : ["Kishtwar"],
   "Ganderbal" : ["Ganderbal"],
   "Shopian" : ["Shopian"],
   "Leh" : ["Leh", "Nubra", "Khaltse"],
   "Kargil" : ["Kargil", "Zanskar"],

  //--------------------------------------------------------------------------------------------
//   Jharkhand
  
  "Bokaro": ["Bokaro", "Chandankiyari", "Kasmar", "Nawadih", "Petro", "Jaridih", "Gomia"]
  ,
  "Chatra": ["Chatra", "Hunterganj", "Kunda", "Pathalgora", "Pratappur", "Tandwa", "Itkhori"]
  ,
  "Deoghar": ["Deoghar", "Devipur", "Karon", "Madhupur", "Mohammad Bazar", "Sarwan"]
  ,
  "Dhanbad": ["Dhanbad", "Baghmara", "Barwadda", "Dumri", "Gobindpur", "Nirsa", "Topchanchi", "Tundi"]
  ,
  "Dumka": ["Dumka", "Kathikund", "Masanjor", "Ramgarh", "Ranishwar", "Shikaripara", "Saraiyahat"]
  ,
  "East Singhbhum": ["Jamshedpur", "Baharagora", "Dhalbhumgarh", "Ghatshila", "Musabani", "Potka"]
  ,
  "Garhwa": ["Garhwa", "Bhandaria", "Bhawanathpur", "Chinia", "Danda", "Majhiaon", "Ramkanda"]
  ,
  "Giridih": ["Giridih", "Bagodar", "Bengabad", "Deori", "Dhanwar", "Jamua", "Pirtand", "Sariya", "Tisri"]
  ,
  "Godda": ["Godda", "Boarijor", "Mahagama", "Pathargama", "Poreyahat", "Sundar Pahari", "Thakurgangti"]
  ,
  "Gumla": ["Gumla", "Basia", "Bishunpur", "Chainpur", "Dumri", "Ghaghra", "Kamdara", "Kolebira", "Palkot", "Raidih", "Sisai"]
  ,
  "Hazaribagh": ["Hazaribagh", "Barkagaon", "Barhi", "Bishnugarh", "Ichak", "Katkamsandi", "Keredari", "Padma", "Tati Jhariya"]
  ,
  "Jamtara": ["Jamtara", "Fatehpur", "Gidhaur", "Jarmundi", "Karmatanr", "Nala", "Narayanpur"]
  ,
  "Khunti": ["Khunti", "Karra", "Kharsawan", "Rania", "Torpa"]
  ,
  "Koderma": ["Koderma", "Chandwara", "Domchanch", "Jainagar", "Markacho", "Satgawan"]
  ,
  "Latehar": ["Latehar", "Balumath", "Barwadih", "Chandwa", "Herhanj", "Manika", "Mahuadanr"]
  ,
  "Lohardaga": ["Lohardaga", "Bhandra", "Kisko", "Kuru", "Senha"]
  ,
  "Pakur": ["Pakur", "Amrapara", "Hiranpur", "Littipara", "Maheshpur"]
  ,
  "Palamu": ["Palamu", "Chainpur", "Chandwa", "Hussainabad"],

  
  //--------------------------------------------------------------------------------------------

  //himachal pradesh

  "Bilaspur": ["Bilaspur", "Ghumarwin", "Jhandutta"],
  
  
    "Chamba": ["Bharmour", "Chamba", "Churah", "Dalhousie", "Holi", "Pangi"],
  
  
    "Hamirpur": ["Bamsan", "Barsar", "Bhoranj", "Hamirpur", "Nadaun", "Sujanpur"],
  
  
    "Kangra": ["Baijnath", "Dehra Gopipur", "Dharamshala", "Jaisinghpur", "Jawalamukhi", "Kangra", "Nagrota Bagwan", "Palampur", "Shahpur"],
  
  
    "Kinnaur": ["Kalpa", "Nichar", "Pooh"],
  
  
    "Kullu": ["Anni", "Banjar", "Kullu", "Manali", "Nirmand", "Sainj"],
  
  
    "Lahaul and Spiti": ["Keylong", "Lahaul", "Spiti"],
  
  
    "Mandi": ["Bali Chowki", "Chachyot", "Dharampur", "Gohar", "Jogindernagar", "Karsog", "Mandi", "Padhar", "Rampur", "Sarkaghat", "Sundar Nagar", "Thunag"],
  
  
    "Shimla": ["Chopal", "Dodra Kwar", "Rampur", "Rohru", "Shimla", "Theog"],
  
  
    "Sirmaur": ["Nahan", "Pachhad", "Paonta Sahib", "Rajgarh", "Shillai"],
  
  
    "Solan": ["Kasauli", "Nalagarh", "Solan"],
  
  
    "Una": ["Amb", "Bangana", "Gagret", "Haroli", "Una"],

  //--------------------------------------------------------------------------------------------

    //manipur

    "Imphal East" : ["Imphal East", "Porompat", "Sawombung"],
   "Imphal West" : ["Imphal West", "Lamshang", "Patsoi"],
   "Thoubal" : ["Thoubal", "Lilong", "Yairipok"],
   "Bishnupur" : ["Bishnupur", "Nambol", "Moirang"],
   "Churachandpur" : ["Churachandpur", "Singngat", "Saikot"],
   "Senapati" : ["Senapati", "Mao", "Karong"],
   "Ukhrul" : ["Ukhrul", "Phungyar", "Kamjong"],
   "Tamenglong" : ["Tamenglong", "Tamei", "Tousem"],
   "Chandel" : ["Chandel", "Tengnoupal", "Machi"],
   "Kangpokpi" : ["Kangpokpi", "Saitu Gamphazol", "Sadar Hills"],

  //--------------------------------------------------------------------------------------------

  //nagaland

  "Kohima" : ["Kohima Sadar", "Jakhama", "Tseminyu"],
   "Dimapur" : ["Dimapur Sadar", "Niuland"],
   "Mokokchung" : ["Mokokchung Sadar", "Koridang"],
   "Tuensang" : ["Tuensang Sadar", "Longleng"],
   "Mon" : ["Mon Sadar", "Phom"],
   "Zunheboto" : ["Zunheboto Sadar", "Satakha"],
   "Phek" : ["Phek Sadar", "Meluri"],
   "Wokha" : ["Wokha Sadar", "Sanis"],
   "Peren" : ["Peren Sadar", "Tening"],
   "Kiphire" : ["Kiphire Sadar"],
   "Longleng" : ["Longleng Sadar"],
   "Noklak" : ["Noklak Sadar"],


  //--------------------------------------------------------------------------------------------

//   Meghalay 
  
  "East Garo Hills": ["Williamnagar", "Samanda", "Resubelpara"]
  ,
  "East Jaintia Hills": ["Khliehriat", "Amlarem", "Laskein"]
  ,
  "East Khasi Hills": ["Shillong", "Mylliem", "Mawlai", "Mawphlang", "Nongthymmai", "Pynursla", "Sohra"]
  ,
  "North Garo Hills": ["Resubelpara", "Kharkutta"]
  ,
  "Ri-Bhoi": ["Nongpoh", "Umsning", "Umroi"]
  ,
  "South Garo Hills": ["Baghmara", "Chokpot", "Gasuapara"]
  ,
  "South West Garo Hills": ["Ampati", "Betasing", "Zikzak"]
  ,
  "South West Khasi Hills": ["Mawkyrwat", "Leshka"]
  ,
  "West Garo Hills": ["Tura", "Dadenggre", "Gambegre", "Rongram", "Selsella"]
  ,
  "West Jaintia Hills": ["Jowai", "Amlarem", "Laskein"]
  ,
  "West Khasi Hills": ["Nongstoin", "Mairang", "Mawthadraishan"],


  //--------------------------------------------------------------------------------------------


//   Kerala 
   "Garhwa" : ["Garhwa", "Bhandaria", "Bhawanathpur", "Dandai", "Ranka"]
  ,
  "Giridih" : ["Giridih", "Bagodar", "Bengabad", "Birni", "Dumri", "Gandey", "Jamua", "Pirtand", "Sariya", "Tisri"]
  ,
  "Godda" : ["Godda", "Boarijor", "Mahagama", "Poreyahat", "Sundar Pahari", "Thakurgangti"]
  ,
  "Gumla" : ["Gumla", "Basia", "Bishunpur", "Chainpur", "Kamdara", "Palkot", "Raidih", "Sisai", "Sohagi"]
  ,
  "Hazaribagh" : ["Hazaribagh", "Barhi", "Barkagaon", "Barkatha", "Dari", "Ichak", "Katkamsandi", "Keredari", "Padma", "Tati Jhariya"]
  ,
  "Jamtara" : ["Jamtara", "Fatehpur", "Karmatanr", "Nala"]
  ,
  "Khunti" : ["Khunti", "Arki", "Karra", "Kharsawan", "Murhu", "Torpa", "Rania"]
  ,
  "Koderma" : ["Koderma", "Chandwara", "Domchanch", "Jainagar", "Markacho", "Satgawan"]
  ,
  "Latehar" : ["Latehar", "Balumath", "Barwadih", "Chandwa", "Garu", "Manika", "Mahuadanr"]
  ,
  "Lohardaga" : ["Lohardaga", "Bhandra", "Kisko", "Kuru", "Senha"]
  ,
  "Pakur" : ["Pakur", "Amrapara", "Hiranpur", "Littipara", "Maheshpur"]
  ,
  "Palamu" : ["Daltonganj", "Barwadih", "Bishrampur", "Chainpur", "Chhatarpur", "Hussainabad", "Manatu", "Pandu", "Patan", "Satbarwa"]
  ,
  "Ramgarh" : ["Ramgarh", "Chitarpur", "Gola", "Mandu", "Patratu", "Ranchi"],

  //--------------------------------------------------------------------------------------------

//   madhya pradesh  
    "Agar Malwa": ["Agar Malwa", "Badod", "Susner"],
 
  
    "Alirajpur": ["Alirajpur", "Bhavra", "Jobat"],
 
  
    "Anuppur": ["Anuppur", "Jaithari", "Kotma", "Pasan"],
 
  
    "Ashoknagar": ["Ashoknagar", "Chanderi", "Isagarh", "Mungaoli", "Shadhora"],
 
  
    "Balaghat": ["Balaghat", "Baihar", "Katangi", "Kirnapur", "Lanji", "Waraseoni"],
 
  
    "Barwani": ["Barwani", "Anjad", "Khetia", "Niwsa", "Pansemal", "Rajpur"],
 
  
    "Betul": ["Amla", "Bhainsdehi", "Betul", "Betul-Bazar", "Chicholi", "Ghoradongri", "Multai", "Shahpur"],
 
  
    "Bhind": ["Ater", "Bhind", "Gohad", "Lahar", "Mehgaon"],
 
  
    "Bhopal": ["Berasia", "Huzur", "Misrod", "Narwar"],
 
  
    "Burhanpur": ["Burhanpur", "Khaknar", "Nepanagar", "Shahpur"],
 
  
    "Chhatarpur": ["Bada Malhera", "Bijawar", "Chandla", "Chhatarpur", "Gaurihar", "Laundi", "Nowgaon", "Rajnagar"],
 
  
    "Chhindwara": ["Amarwara", "Bicchiya", "Chaurai", "Chhindwara", "Jamai", "Pandhurna", "Parasia", "Sausar", "Tamia"],
 
  
    "Damoh": ["Batiyagarh", "Damoh", "Hatta", "Patharia", "Patera", "Tendukheda"],
 
  
    "Datia": ["Bhander", "Datia", "Indergarh", "Seondha"],
 
  
    "Dewas": ["Bagli", "Dewas", "Kannod", "Khategaon", "Sonnkatch", "Tonk Khurd"],
 
  
    "Dhar": ["Badnawar", "Dahi", "Dharampuri", "Dhar", "Kukshi", "Manawar", "Sardarpur"],
 
  
    "Dindori": ["Dindori", "Samnapur", "Shahpura"],
 
  
    "Guna": ["Aron", "Ashok Nagar", "Chachoda", "Guna", "Kumbhraj", "Raghogarh-Vijaypur"],
 
  
    "Gwalior": ["Bhitarwar", "Dabra", "Gird", "Gwalior", "Pichhore"],
 
  
    "Harda": ["Harda", "Harsud", "Khirkiya", "Timarni"],
 
  
    "Hoshangabad": ["Babai", "Bankhedi", "Hoshangabad", "Itarsi", "Pipariya", "Seoni Malwa", "Sohagpur"],
 
  
    "Indore": ["Depalpur", "Hatod", "Indore", "Mhow", "Sawer"],
 
  
    "Jabalpur": ["Gotegaon", "Jabalpur", "Kundam", "Panagar", "Patangarh", "Sihora"],
 
  
    "Jhabua": ["Alirajpur", "Jobat", "Jhabua", "Meghnagar", "Petlawad", "Ranapur", "Thandla"],
 
  
    "Katni": ["Badwara", "Bahoriband", "Barhi", "Dhimarkheda", "Gurh", "Rithi", "Vijayraghavgarh"],
 
  
    "Khandwa": ["Harsud", "Khandwa", "Pandhana", "Punasa"],
 
  
    "Khargone": ["Barwaha", "Bhagwanpura", "Bhikangaon", "Gogawan", "Julwania", "Kasrawad", "Khargone", "Maheshwar", "Segaon"],
 
  
    "Mandla": ["Baihar", "Bichhiya", "Dindori", "Ghughari", "Mandla", "Nainpur", "Niwas", "Shahpura"],
 
  
    "Mandsaur": ["Bhanpura", "Daloda", "Garoth", "Malhargarh", "Mandsaur", "Manasa", "Sitamau", "Suaranera"],
 
  
    "Morena": ["Ambah", "Joura", "Morena", "Porsa", "Sabalgarh"],
 
  
    "Nagda": ["Nagda", "Khachrod"],
 
  
    "Narsinghpur": ["Gadarwara", "Gotegaon", "Kareli", "Narsimhapur", "Tendukheda"],
 
  
    "Neemuch": ["Jawad", "Manasa", "Neemuch", "Rampura", "Singoli", "Jiran"],
 
  
    "Panna": ["Ajaigarh", "Devendranagar", "Gunnor", "Panna", "Pawai", "Raipura"],
 
  
    "Raisen": ["Begamganj", "Gairatganj", "Goharganj", "Obedullaganj", "Raisen", "Silwani", "Udaipura"],
 
  
    "Rajgarh": ["Biaora", "Jirapur", "Khilchipur", "Narsinghgarh", "Rajgarh", "Sarangpur", "Talen"],
 
  
    "Ratlam": ["Alot", "Bajna", "Jaora", "Piploda", "Ratlam", "Rawti", "Sailana"],
 
  
    "Rewa": ["Gurh", "Hanumana", "Jawa", "Mangawan", "Mauganj", "Raipur - Karchuliyan", "Rewa", "Sirmour", "Teonthar"],
 
  
    "Sagar": ["Banda", "Bina", "Deori", "Garhakota", "Kesli", "Khurai", "Malthon", "Rahatgarh", "Rehli", "Sagar", "Shahgarh"],
 
  
    "Satna": ["Amarpatan", "Birsinghpur", "Maihar", "Majhgawan", "Nagod", "Raghurajnagar", "Ramnagar", "Rampur Baghelan", "Satna", "Unchahara"],
 
  
    "Sehore": ["Ashta", "Budni", "Ichhawar", "Nasrullaganj", "Rehti", "Sehore"],
 
  
    "Seoni": ["Barghat", "Bhainsdehi", "Chhapara", "Dhanora", "Keolari", "Lakhnadon", "Lanji", "Kurai", "Nainpur", "Seoni", "Tamia"],
 
  
    "Shahdol": ["Anuppur", "Beohari", "Jaisinghnagar", "Jaithari", "Jaitpur", "Kelhauri", "Pushprajgarh", "Sohagpur", "Burhar-Shahpur", "Shahdol"],
 
  
    "Shajapur": ["Agar", "Badod", "Moman Badodia", "Nalkheda", "Shajapur", "Shujalpur", "Susner"],
 
  
    "Sheopur": ["Beerpur", "Karahal", "Sheopur", "Vijaypur"],
 
  
    "Shivpuri": ["Badarwas", "Karanjia", "Khaniyadhana", "Kolaras", "Narwar", "Pichhore", "Pohri", "Shivpuri"],
 
  
    "Sidhi": ["Churhat", "Gopadbanas", "Kusmi", "Majhauli", "Manpur", "Rampur Naikin", "Sihawal", "Sondwa", "Chitrangi", "Deosar"],
 
  
    "Singrauli": ["Chitrangi", "Deosar", "Singrauli"],
 
  
    "Tikamgarh": ["Baldeogarh", "Jatara", "Mohangarh", "Niwari", "Palera", "Prithvipur", "Tikamgarh"],
 
  
    "Ujjain": ["Badnagar", "Ghattia", "Khacharod", "Mahidpur", "Nagda", "Tarana", "Ujjain"],
 
  
    "Umaria": ["Bandhogarh", "Manpur", "Nowrozabad", "Pali", "Umaria"],
 
  
    "Vidisha": ["Basoda", "Gyaraspur", "Ichhawar", "Kurwai", "Lahar", "Nateran", "Shamshabad", "Tyonda", "Vidisha"],


  //--------------------------------------------------------------------------------------------
   
  //mizoram

  "Aizawl": ["Aizawl East", "Aizawl West", "Aizawl North", "Aizawl South"],
  
"Kolasib": ["Kolasib", "Bilkhawthlir", "Thingdawl"],
  
"Mamit": ["Mamit", "Zawlnuam"],

"Serchhip": ["Serchhip", "North Vanlaiphai"],

"Champhai": ["Champhai", "Khawzawl", "Khawbung"],

"Lunglei": ["Lunglei", "Tlabung", "Hnahthial", "Lungsen"],

"Lawngtlai": ["Lawngtlai", "Sangau"],

"Saiha": ["Saiha"],

"Saitual": ["Saitual"],

"Hnahthial": ["Hnahthial"],

  //--------------------------------------------------------------------------------------------

//   Tamil nadu 
  
  "Ariyalur": ["Ariyalur", "Udayarpalayam", "Sendurai"]
  ,
 "Chengalpattu": ["Chengalpattu", "Cheyyur", "Kancheepuram", "Madurantakam", "Sriperumbudur", "Tambaram", "Thiruporur"]
  ,
 "Chennai": ["Chennai Central", "Chennai North", "Chennai South", "Chengalpattu", "Poonamallee", "Sriperumbudur", "Tambaram"]
  ,
 "Coimbatore": ["Coimbatore North", "Coimbatore South", "Metropolitan", "Pollachi", "Sulur", "Valparai"]
  ,
 "Cuddalore": ["Cuddalore", "Chidambaram", "Kattumannarkoil", "Panruti", "Tittakudi", "Virudhachalam"]
  ,
 "Dharmapuri": ["Dharmapuri", "Harur", "Palacode", "Pennagaram"]
  ,
 "Dindigul": ["Dindigul", "Athoor", "Kodaikanal", "Natham", "Nilakottai", "Oddanchatram", "Palani"]
  ,
 "Erode": ["Erode", "Bhavani", "Gobichettipalayam", "Perundurai", "Sathyamangalam"]
  ,
 "Kallakurichi": ["Kallakurichi", "Chinnasalem", "Kalvarayan Hills", "Sankarapuram", "Thiagadurgam"]
  ,
 "Kanchipuram": ["Kanchipuram", "Chengalpattu", "Sriperumbudur", "Tambaram", "Uthiramerur"]
  ,
 "Kanyakumari": ["Kanyakumari", "Agastheeswaram", "Thovalai", "Killiyoor"]
  ,
 "Karur": ["Karur", "Aranthangi", "Kulithalai", "Manapparai"]
  ,
 "Krishnagiri": ["Krishnagiri", "Hosur", "Pochampalli", "Uthangarai"]
  ,
 "Madurai": ["Madurai East", "Madurai West", "Melur", "Peraiyur", "Thirumangalam", "Usilampatti", "Vadipatti"]
  ,
 "Nagapattinam": ["Nagapattinam", "Kilvelur", "Kuthalam", "Mayiladuthurai", "Sirkazhi", "Tharangambadi", "Vedaranyam"]
  ,
 "Namakkal": ["Namakkal", "Paramathi-Velur", "Rasipuram", "Tiruchengode"]
  ,
 "Nilgiris": ["Udhagamandalam", "Coonoor", "Gudalur", "Kundah", "Naduvattam"]
  ,
 "Perambalur": ["Perambalur", "Kunnam", "Veppanthattai"]
  ,
 "Pudukkottai": ["Pudukkottai", "Alangudi", "Aranthangi", "Avadaiyarkoil", "Gandarvakottai", "Illuppur", "Karambakkudi", "Thirumayam"]
  ,
 "Ramanathapuram": ["Ramanathapuram"],


  //--------------------------------------------------------------------------------------------
//  sahore 
 
 "Sehore": ["Ashta", "Budni", "Ichhawar", "Nasrullaganj", "Rehti", "Sehore"],

  //--------------------------------------------------------------------------------------------

  //uttarakhnd

  "Dehradun" : ["Dehradun", "Vikasnagar", "Rishikesh"],
  "Haridwar" : ["Haridwar", "Roorkee", "Laksar"],
  "Udham Singh Nagar" : ["Rudrapur", "Kashipur", "Kichha"],
  "Nainital" : ["Nainital", "Haldwani", "Ramnagar"],
  "Almora" : ["Almora", "Ranikhet", "Jainti"],
  "Pithoragarh" : ["Pithoragarh", "Didihat", "Gangolihat"],
  "Chamoli" : ["Chamoli", "Joshimath", "Gopeshwar"],
  "Tehri Garhwal" : ["Tehri", "New Tehri", "Pratapnagar"],
  "Rudraprayag" : ["Rudraprayag", "Agastyamuni"],
  "Uttarkashi" : ["Uttarkashi", "Barkot", "Purola"],
  "Pauri Garhwal" : ["Pauri", "Srinagar", "Kotdwar"],
  "Champawat" : ["Champawat", "Lohaghat"],
  "Bageshwar" : ["Bageshwar", "Kapkot"],
  "Rudraprayag" : ["Rudraprayag", "Agastyamuni"],


  //--------------------------------------------------------------------------------------------
//   delhi
  "Central Delhi": ["Daryaganj", "Paharganj", "Karol Bagh", "Civil Lines"]
  ,
  "East Delhi": ["Gandhi Nagar", "Preet Vihar", "Mayur Vihar", "Patparganj", "Laxmi Nagar"]
  ,
  "New Delhi": ["Connaught Place", "Parliament Street", "Chanakyapuri"]
  ,
  "North Delhi": ["Sadar Bazaar", "Kotwali", "Kashmere Gate", "Model Town"]
  ,
  "North East Delhi": ["Seelampur", "Yamuna Vihar", "Karawal Nagar", "Shahdara"]
  ,
  "North West Delhi": ["Narela", "Saraswati Vihar", "Rohini", "Kanjhawala"]
  ,
  "South Delhi": ["Defence Colony", "Hauz Khas", "Kalkaji", "Sarita Vihar"]
  ,
  "South East Delhi": ["Saket", "Mehrauli", "Lajpat Nagar", "Nehru Place"]
  ,
  "South West Delhi": ["Vasant Vihar", "Dwarka", "Najafgarh"]
  ,
  "West Delhi": ["Rajouri Garden", "Patel Nagar", "Moti Nagar", "Punjabi Bagh"],
  //--------------------------------------------------------------------------------------------


//   andaman - nikpbar  
     "Nicobar":["Car Nicobar", "Nancowry", "Central Nicobar", "Camorta", "Katchal", "Nicobar"],
  
  
    "North and Middle Andaman": ["Mayabunder", "Diglipur", "Rangat"],
  
  
    "South Andaman": ["Port Blair", "Ferrargunj", "Little Andaman"],

  //--------------------------------------------------------------------------------------------

  //west bangal

  

  "Alipurduar":["Alipurduar" ,"Falakata" ,"Kumargram" ,"Madarihat" ,"Kalchini"],
  
   "Bankura":["Bankura" ,"Khatra" ,"Ranibandh" ,"Raipur" ,"Sarenga" ,"Sonamukhi"],
  
   "Birbhum":["Suri" ,"Bolpur" ,"Rampurhat" ,"Nalhati"],
  
   "Cooch Behar":["Cooch Behar" ,"Dinhata" ,"Mathabhanga" ,"Mekliganj"],
  
   "Dakshin Dinajpur":["Balurghat" ,"Gangarampur" ,"Tapan"],
  
   "Darjeeling":["Darjeeling" ,"Kurseong" ,"Kalimpong" ,"Mirik"],
  
   "Hooghly":["Chinsurah" ,"Chandannagar" ,"Serampore" ,"Arambagh"],
  
   "Howrah":["Howrah" ,"Uluberia" ,"Bally" ,"Domjur"],
  
   "Jalpaiguri":["Jalpaiguri" ,"Alipurduar" ,"Mal" ,"Dhupguri"],
  
   "Jhargram":["Jhargram" ,"Gopiballavpur"],
  
   "Kalimpong":["Kalimpong"],
  
   "Kolkata":["Kolkata"],
  
   "Malda":["Malda" ,"Chanchal" ,"Kaliachak" ,"English Bazar"],
  
   "Murshidabad":["Berhampore" ,"Lalbagh" ,"Kandi" ,"Domkal"],
  
   "Nadia":["Krishnanagar" ,"Ranaghat" ,"Kusumgram" ,"Hanskhali"],
  
   "North 24 Parganas":["Barasat" ,"Basirhat" ,"Bidhannagar" ,"Bongaon" ,"Habra"],
  
  
  
   "Paschim Medinipur (West Medinipur)":["Midnapore" ,"Jhargram" ,"Kharagpur" ,"Ghatal"],
  
   "Purba Bardhaman (East Bardhaman)":["Burdwan" ,"Kalna" ,"Katwa"],
  
   "Purba Medinipur (East Medinipur)":["Tamluk" ,"Haldia" ,"Egra" ,"Contai"],
  
   "Purulia":["Purulia" ,"Raghunathpur"],
  
   "South 24 Parganas":["Alipore" ,"Baruipur" ,"Diamond Harbour" ,"Canning"],
  
   "Uttar Dinajpur":["Raiganj" ,"Kaliaganj" ,"Islampur"],

   "Paschim Bardhaman": ["West Bardhaman","Asansol" ,"Durgapur" ,"Raniganj"],

  //--------------------------------------------------------------------------------------------

  //daman deu

//   damandiu
   "Daman": ["Daman"],
"Diu" : ["Diu"]

    };



    subDistrictsData[selectedDistrict].forEach(subdistrict => {
        const option = document.createElement("option");
        option.value = subdistrict;
        option.text = subdistrict;
        subdistrictSelect.appendChild(option);
    });
}
