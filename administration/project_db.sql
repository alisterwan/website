--
-- PostgreSQL database dump
--

SET client_encoding = 'LATIN1';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

--
-- Name: case_id_case_seq; Type: SEQUENCE SET; Schema: public; Owner: jwankutk
--

SELECT pg_catalog.setval('case_id_case_seq', 13, true);


--
-- Name: chargers_id_charger_seq; Type: SEQUENCE SET; Schema: public; Owner: jwankutk
--

SELECT pg_catalog.setval('chargers_id_charger_seq', 6, true);


--
-- Name: laptop_id_laptop_seq; Type: SEQUENCE SET; Schema: public; Owner: jwankutk
--

SELECT pg_catalog.setval('laptop_id_laptop_seq', 87, true);


--
-- Name: printers_id_printer_seq; Type: SEQUENCE SET; Schema: public; Owner: jwankutk
--

SELECT pg_catalog.setval('printers_id_printer_seq', 12, true);


--
-- Name: printers_price_seq; Type: SEQUENCE SET; Schema: public; Owner: jwankutk
--

SELECT pg_catalog.setval('printers_price_seq', 11, true);


--
-- Name: usb_id_usb_seq; Type: SEQUENCE SET; Schema: public; Owner: jwankutk
--

SELECT pg_catalog.setval('usb_id_usb_seq', 15, true);


--
-- Data for Name: charger; Type: TABLE DATA; Schema: public; Owner: jwankutk
--

COPY charger (model, brand, quantity, price, description, id) FROM stdin;
Compact Laptop Charger	Targus	8	49	The Targus Compact Laptop Charger is half the size and weight of typical AC chargers on the market today. Ideal for travel, this AC charger includes 9 laptop tips and one mini-USB tip for cell phones, cameras or other compatible devices. Easily power or charge a laptop and one additional item such as a camera, cell phone or MP3 player at the same time. For added convenience the charger plugs directly into the wall and the AC prongs rotate 180 degrees, allowing the user to plug the charger into a power strip without blocking other outlets. The prongs also lie flat for added portability. The thin, lightweight cord packs quickly and easily and includes an elastic band for cord management. The integrated tip storage clips onto the power cord so tips stay with the charger and are readily available when needed.	3
K33197	Kensington	12	19	Ultra slim lightweight design for easy portability everywhere\r\nPowers and charges a notebook computer from any Wall or Auto/Air source\r\nNotebook tips included for most Dell, HP, Compaq, IBM, Lenovo, Toshiba, Sony, Gateway, Acer PCs\r\nWorks with your own USB cable or purchase a Kensington USB Power Tip Pack with retractable USB cable (sold separately)\r\nRegardless of suffix, SmartTips are identical and compatible as noted in user's manual (for example, N19B and N19 are identical products)	5
Netbook Charger	iGoGreen	7	54	This ultra-portable charger lets you charge your netbook and other mobile devices from wall, car or airplane outlets. Works with iGo power tips to charge mobile devices such as mobile phones, Bluetooth headsets, MP3 players, portable gaming devices and more. Simply select iGo power tips for all your devices.	2
K38082US	Kensington	7	49	Compatible with HP and Compaq family laptops\nBuilt-in USB power port eliminates the need for a separate USB charger\nCharges multiple models in the HP and Compaq family\nProvides reliable power at a great price\nIdeal for use on the road, at home, in the office	6
Laptop Wall Charger	iGoGreen	10	65	Charge almost any laptop from this ultra-slim Energy Star-certified wall charger. The USB cable also lets you charge mobile devices such mobile phones, Bluetooth headsets, MP3 players and more. Simply select iGo power tips for all your devices.	1
Premium Laptop Charger	Targus	1	126	The Targus Laptop Charger is half the size and weight of typical AD/DC chargers and is about the size of a blackberry. As the smallest adapter on the market, this charger is ideal for travel and includes 9 laptop tips, one mini-USB tip for cell phones, cameras or other compatible devices and one iPod/iPhone tip. Easily power or charge a laptop and one additional item such as a Blackberry or iPod at the same time. For added convenience the charger plugs directly into the wall and the AC prongs rotate 180 degrees, allowing the user to plug the charger into a power strip without blocking other outlets. The prongs also lie flat for added portability. To charge or power multiple devices in the car, the charger includes a portable auto adapter. The thin, lightweight cord packs quickly and easily and includes an elastic band for cable management. The integrated tip storage clips onto the power cord so tips stay with the charger and are readily available when needed. The Premium Laptop Charger also comes with the Tips From Targus Program which supplies users with a free tip for your 2nd laptop and/or cell phone and free tips for future laptops and cell phones so the charger remains compatible with your devices.	4
\.


--
-- Data for Name: customers; Type: TABLE DATA; Schema: public; Owner: jwankutk
--

COPY customers (firstname, surname, address, city, country, username, password, mail, id_customer) FROM stdin;
John Alister	Wan Kut Kai	4 rue claude Debussy	Tournan en Brie	France	alisterwan	ca11b74be559170f53df82c86ea6f8d865202baa	alisterwan@gmail.com	1
jean-marc	Roca	19 rue De chevry	Presles en Brie	France	jroca	f7c3bc1d808e04732adf679965ccc34ca7ae3441	jroca@gmail.com	2
firstname	surname	address	city	country	username	5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8	mail@mail.mail	3
\.


--
-- Data for Name: laptop; Type: TABLE DATA; Schema: public; Owner: jwankutk
--

COPY laptop (model, brand, type, price, size, quantity, system, processor, ram, hdd, batterylife, graphiccard, id) FROM stdin;
K53SJ-SX019V	Asus	Performance	598	15,6	4	Windows 7	Intel Core i3	4096	640	up to 4 hours	NVIDIA Geforce GT520M	6
G53JW	Asus	Gamers	1200	15,6	3	Windows 7	Intel Core i7	8192	500	up to 4 hours	NVIDIA GTX 460M	7
G53SW	Asus	Gamers	1135	15,6	3	Windows 7	Intel Core i7	4096	750	up to 3 hours	NVIDIA GTX 460M	8
N53JF-SX094V	Asus	Multimedia	839	15,6	5	Windows 7	Intel Core i5	4096	640	up to 4 hours	NVIDIA GeForce GT 425M	9
P50IJ-SO010X	Asus	Notebook	354	15,6	3	Windows 7	Intel Core 2 Duo	4096	320	up to 5 hours	NVIDIA GeForce GT 550M	11
mini 110 series	HP	Netbook	249	10	6	Windows 7	Atom N455	1024	250	up to 5 hours	Intel Chipset	16
mini 210-2046sf	HP	Netbook	249	10	6	Windows 7	Atom N455	1024	250	up to 7 hours	Intel Chipset	17
pavilion dm1z series	HP	Netbook	400	11,6	3	Windows 7	AMD E-350	2048	250	up to 3 hours	AMD Radeon HD 6310	18
g62-b56sf	HP	Notebook	450	15,6	8	Windows 7	Intel Pentium P6100	4096	640	up to 4 hours	Intel HD Graphics	20
g62-b48sf	HP	Notebook	450	15,6	3	Windows 7	AMD Athlon II P340	4096	500	up to 4 hours	ATI Mobility Radeon HD 5470 	21
pavilion dv6-3165ef	HP	Performance	699	15,6	6	Windows 7	Intel Core i5	4096	500	up to 3 hours	ATI Mobility Radeon HD 5650	23
pavilion dv6-3171sf	HP	Performance	799	15,6	4	Windows 7	Intel Core i7	4096	750	up to 3 hours	ATI Mobility Radeon HD 5650	24
envy 14-1111ef-1	HP	Multimedia	899	14,5	5	Windows 7	Intel Core i5	4096	500	up to 5 hours	ATI Mobility Radeon HD 5650	26
envy 17-1113ef	HP	Multimedia	998	17,3	5	Windows 7	Intel Core i5	4096	640	up to 3 hours	ATI Mobility Radeon HD 5850	27
envy 14-1212ef	HP	Multimedia	998	14,5	4	Windows 7	Intel Core i5	4096	750	up to 4 hours	ATI Mobility Radeon HD 5650	28
dv7 quad edition	HP	Gamers	1300	17,3	5	Windows 7	Intel Core i7	4096	640	up to 2 hours	ATI Mobility Radeon HD 6570	29
pavilion g6-1051sf	HP	Performance	599	15,6	8	Windows 7	Intel Core i5	4096	640	up to 3 hours	AMD Radeon HD 6470M 	22
aspire 8943g	Acer	Gamers	1200	18,4	3	Windows 7	Intel Core i7	4096	640	up to 3 hours	ATI Mobility Radeon HD 5650	31
aspire one a150x-3g	Acer	Netbook	239	10	8	Windows XP	Intel Atom N450	1024	160	up to 8 hours	Intel Chipset	36
aspire one happy	Acer	Netbook	259	10	7	Windows 7	Intel Atom N550	1024	250	up to 8 hours	Intel Chipset	37
aspire 8930g	Acer	Gamers	749	18	9	Windows Vista	Intel Quad Core	4096	500	up to 3 hours	NVIDIA GeForce 9600M GT	30
aspire d250	Acer	Netbook	250	10	8	Windows XP	Intel Atom N270	1024	160	up to 6 hours	Intel Chipset	39
timelineX 202x146	Acer	Notebook	310	11,6	5	Windows 7	Intel Core i3	2048	320	up to 6 hours	Intel Graphics	41
aspire one d255	Acer	Netbook	239	10	8	Windows 7	Intel Atom N550	1024	250	up to 6 hours	Intel Chipset	35
aspire 6930g 6723	Acer	Notebook	330	15,6	5	Windows Vista	Intel Core 2 Duo	4096	320	up to 4 hours	NVIDIA GeForce 9600M GS	38
aspire tm5335	Acer	Notebook	352	15,6	5	Windows 7	Intel Celeron	2048	250	up to 3 hours	Intel Chipset	40
aspire as5820	Acer	Multimedia	975	15,6	4	Windows 7	Intel Core i5	4096	750	up to 3 hours	ATI Mobility Radeon HD 6550	33
ethos as8943g	Acer	Multimedia	1100	18,4	3	Windows 7	Intel Core i7	4096	500	up to 3 hours	ATI Mobility Radeon HD 5850	34
ethos as5943	Acer	Performance	724	15,6	4	Windows 7	Intel Core i3	4096	500	up to 4 hours	ATI Mobility Radeon HD 5650	43
inspiron mini 1018	Dell	Netbook	249	10	8	Windows 7	Intel Atom N455	1024	160	up to 6 hours	Intel Chipset	44
latitude 2120	Dell	Netbook	401	10	5	Windows 7	Intel Atom N455	1024	250	up to 8 hours	Intel Graphics	46
inspiron 15R	Dell	Notebook	499	15,6	6	Windows 7	Intel Pentium	4096	320	up to 4 hours	ATI Mobility Radeon HD 5470	48
vostro 1015	Dell	Notebook	449	15,6	5	Windows 7	Intel Core 2 Duo	3072	250	up to 3 hours	Intel HD Graphics	49
vostro 3300	Dell	Notebook	449	15,6	5	Windows 7	Intel Core i3	2048	250	up to 5 hours	Intel HD Graphics	50
xps 15	Dell	Multimedia	799	15,6	6	Windows 7	Intel Core i5	4096	500	up to 4 hours	NVIDIA GeForce GT525M	51
xps 17	Dell	Multimedia	899	15,6	6	Windows 7	Intel Core i5	4096	500	up to 3 hours	NVIDIA GeForce GT550M	52
precision m4600	Dell	Performance	1649	15,6	3	Windows 7	Intel Core i5	4096	500	up to 3 hours	AMD FIREPRO M5950	53
latitude e6410	Dell	Performance	2400	15,6	5	Windows 7	Intel Core i5	4096	500	up to 4 hours	Intel HD Graphics	54
alienware m14x	Dell	Gamers	1200	14,5	3	Windows 7	Intel Core i7	4096	750	up to 3 hours	NVIDIA GeForce GT555M	55
alienware m11x	Dell	Gamers	1100	11,6	4	Windows 7	Intel Core i7	4096	320	up to 3 hours	NVIDIA GeForce GT555M	56
inspiron duo	Dell	Netbook	599	11,6	6	Windows 7	Intel Atom N550	2048	250	up to 5 hours	Intel Graphics	47
alienware m17x	Dell	Gamers	1649	18,4	5	Windows 7	Intel Core i7	4096	500	up to 3 hours	NVIDIA GeForce GT555M	57
ns310	Samsung	Netbook	249	10	6	Windows 7	Intel Atom N550	1024	160	up to 7 hours	Intel Chipset	58
nc210	Samsung	Netbook	359	10	9	Windows 7	Intel Atom N550	1024	250	up to 8 hours	Intel Chipset	59
n145	Samsung	Netbook	249	10	7	Windows 7	Intel Atom N550	1024	250	up to 7 hours	Intel Chipset	60
nf210	Samsung	Netbook	279	10	7	Windows 7	Intel Atom N550	1024	250	up to 7 hours	Intel Chipset	61
200b5a	Samsung	Notebook	450	15,6	6	Windows 7	Intel Core i3	2048	320	up to 4 hours	Intel HD Graphics	62
p530	Samsung	Notebook	379	15,6	6	Windows 7	Intel Core i3	2048	250	up to 7 hours	Intel HD Graphics	63
400b5b	Samsung	Notebook	459	15,6	5	Windows 7	Intel Core i3	3072	320	up to 4 hours	Intel HD Graphics	64
p580	Samsung	Notebook	379	15,6	3	Windows 7	Intel Core i3	2048	320	up to 3 hours	Intel HD Graphics	65
rf511	Samsung	Performance	799	15,6	3	Windows 7	Intel Core i5	6144	640	up to 4 hours	NVIDIA GeForce GT 540M	66
rc510	Samsung	Performance	799	15,6	4	Windows 7	Intel Core i5	4096	640	up to 3 hours	NVIDIA GeForce 315M (Optimus) External Graphics	67
r580	Samsung	Performance	769	15,6	3	Windows 7	Intel Core i3	4096	500	up to 4 hours	NVIDIA GeForce GT 540M	68
rc710	Samsung	Performance	649	15,6	5	Windows 7	Intel Core i5	4096	320	up to 4 hours	Intel HD Graphics	69
rv511	Samsung	Multimedia	779	15,6	5	Windows 7	Intel Core i5	4096	500	up to 4 hours	Intel HD Graphics	70
rv510	Samsung	Multimedia	649	15,6	5	Windows 7	Intel Core i3	3072	640	up to 4 hours	Intel HD Graphics	71
900x3a	Samsung	Multimedia	707	15,6	3	Windows 7	Intel Core i5	4096	640	up to 3 hours	Intel HD Graphics	72
sf311	Samsung	Multimedia	619	15,6	4	Windows 7	Intel Core i5	4096	500	up to 4 hours	NVIDIA GeForce GT 540M	73
r780	Samsung	Gamers	999	15,6	6	Windows 7	Intel Core i5	4096	640	up to 4 hours	AMD Radeon HD 6310	74
rf712	Samsung	Gamers	799	15,6	4	Windows 7	Intel Core i5	4096	500	up to 4 hours	NVIDIA GeForce GT 540M	75
nb500	Toshiba	Netbook	265	10	7	Windows 7	Intel Atom N455	1024	250	up to 7 hours	Intel Chipset	76
nb520	Toshiba	Netbook	259	10	6	Windows 7	Intel Atom N455	1024	250	up to 7 hours	Intel Chipset	77
qosmio f60	Toshiba	Multimedia	899	15,6	4	Windows 7	Intel Core i5	4096	640	up to 3 hours	NVIDIA GeForce GT 330M	79
satellite pro c660	Toshiba	Notebook	450	15,6	4	Windows 7	Intel Core i3	4096	500	up to 5 hours	Intel HD Graphics	81
satellite pro l650	Toshiba	Notebook	649	15,6	6	Windows 7	Intel Core i3	4096	640	up to 4 hours	NVIDIA GeForce GT 540M	82
satellite a665	Toshiba	Gamers	899	15,6	3	Windows 7	Intel Core i7	4096	640	up to 5 hours	NVIDIA GeForce GTS 350M	83
satellite a660	Toshiba	Gamers	949	15,6	3	Windows 7	Intel Core i7	4096	640	up to 4 hours	NVIDIA GeForce GTS 330M	84
satellite r630	Toshiba	Performance	799	15,6	5	Windows 7	Intel Core i3	4096	640	up to 4 hours	Intel HD Graphics	85
tecra r850	Toshiba	Performance	739	15,6	4	Windows 7	Intel Core i5	4096	320	up to 4 hours	Intel HD Graphics	86
nb550d	Toshiba	Netbook	249	10	4	Windows 7	AMD C30 	1024	250	up to 10 hours	AMD Radeon HD 6250M	78
N53SN-SZ008V	Asus	Multimedia	1049	15,6	2	Windows 7	Intel Core i7	6144	640	up to 4 hours	NVIDIA GeForce GT 550M	10
macbook air	Apple	Notebook	1139	13	6	Mac OS X	Intel Core 2 Duo	2048	128	up to 5 hours	NVIDIA GeForce 320M GT	14
macbook	Apple	Multimedia	999	13	7	Mac OS X	Intel Core 2 Duo	2048	250	up to 7 hours	NVIDIA GeForce 320M GT	15
P42F-VO007X	Asus	Notebook	707	15,6	2	Windows 7	Intel Core i3	4096	320	up to 4 hours	Intel HD Graphics	3
eee pc 1008HA	Asus	Netbook	299	10	6	Windows XP	Atom N280	1024	160	up to 5 hours	Intel chipset	4
X52DR-EX107V	Asus	Performance	648	15,6	31	Windows 7	AMD Phenom II X4 P920	4096	500	up to 4 hours	ATI Mobility Radeon HD 5470	2
qosmio x500	Toshiba	Multimedia	889	15,6	2	Windows 7	Intel Core i5	4096	640	up to 4 hours	NVIDIA GeForce GTX 460M	80
pavilion rossignol koopman	HP	Performance	699	15,6	6	Windows 7	Intel Core i5	4096	1000	up to 4 hours	ATI Mobility Radeon HD 5650	25
eee pc 1215 N	Asus	Netbook	459	12,1	0	Windows 7	Atom D525	2048	250	up to 6 hours	NVIDIA ION	5
inspiron mini 1012	Dell	Netbook	309	10	4	Windows 7	Intel Atom N450	1024	250	up to 8 hours	Intel Chipset	45
B53J-SO090X	Asus	Performance	910	15,6	35	Windows 7	Intel Core i5	4096	320	up to 3 hours	ATI Mobility Radeon HD 5470	1
eee pc 1005PR	Asus	Netbook	300	10	9	Windows XP	Atom N450	1024	250	up to 8 hours	Intel Chipset	13
aspire aS5745	Acer	Performance	899	15,6	1	Windows 7	Intel Core i5	4096	500	up to 3 hours	NVIDIA Geforce GT425M	42
presario CQ56-142SF	HP	Notebook	379	15,6	3	Windows 7	Intel Celeron 900	3072	320	up to 3 hours	Intel Chipset	19
macbook pro	Apple	Performance	1149	13	51	Mac OS X	Intel Core i5	4096	320	up to 7 hours	NVIDIA GeForce 9600M GT	12
\.


--
-- Data for Name: laptopcase; Type: TABLE DATA; Schema: public; Owner: jwankutk
--

COPY laptopcase (model, brand, size, quantity, price, description, id) FROM stdin;
Case Notebook	Targus	17	14	20	The Targus 17" Notebook Slip Case features a neoprene exterior, which provides protection for your notebook and soft comfortable carrying handles. This slip case accommodates notebooks with screens up to 17" and even though it has a slim design, it has ample space in the front and interior storage sections for business cards, pens, keys and files. Also featured is the unique shock-absorbing Equalizer strap that evenly distributes weight over your shoulder for greater comfort.	2
Netbook Sleeve	Targus	10,2	15	9	This Targus A7 netbook sleeve is designed for 10.2-inch netbooks. Designed of soft, yet durable neoprene exterior with industry-grade tarpaulin gussets, the TSS10906US will keep your netbook safe and secure. The Targus Tri-cell Cushion System provides extra padding while allowing for ventilation. The soft interior provides a soft, cushioned pillow for your netbook to protect against dust, scratches and scuffs. The A7 (TSS10906US) is water-resistant and ready to protect your netbook.	3
Zip-Thru	Targus	16	8	31	The Targus Zip-Thru 15.4" Traditional laptop case is designed to help you clear airport security without removing your laptop from your case. This 15.4" clamshell case splits down the middle, isolating the laptop on one side to allow for clear X-ray scanning. The Zip-Thru Traditional case is lightweight and includes a removable, adjustable, padded shoulder strap, a carry handle, and a trolley strap for attachment to rolling luggage. In addition, the case includes a spacious exterior file pocket with phone sleeve, pen loops and key clip, and interior pockets with room for files, mobile accessories, business cards and more.	4
Hardshell Case	Incase	13	4	52	Compatible with the latest MacBook Pro our Hardshell Case features durable, injection-molded construction for excellent notebook coverage and a custom fit. With a frosted hardshell exterior, soft-touch coating, raised rubber feet, thermal vents and unobstructed access to all features, the Hardshell Case is the most sophisticated and discreet option in notebook protection.	10
Laptop Sleeve	HP	15	12	30	This stylish HP Laptop sleeve helps protect your laptop when carried by itself or inside a bag. It has a front pocket for essential accessories, and a comfortable retractable handle. This neoprene sleeve is custom made to fit your HP laptop. Protects laptop from bumps and bruises Front pocket for accessories Material: Neoprene.	11
Carrying Case	HP	13	12	32	Case Type: Sleeve Material: Neoprene Fit Most Screen Size: 16" Dimensions: 14.90" x 10.20" x 1.70" Features: Stylish protective sleeve in black with light blue trim; fits laptops with screens up to 16 inches wide Large front pocket for storing documents, folders, plane tickets, and more Secure zippered closure Made of padded, durable neoprene Parts: 1 year limited Labor: 1 year limited.	12
Notebook Sleeve	HP	15	13	13	It has a faux-fur interior, front zipper pocket for essential accessories, and comfortable retractable handle. This neoprene sleeve, featuring our link pattern, is custom made to fit your HP notebook. 1 Year Limited WU677AA WU677AA Notebook Case HP Sleeve 14.5".	13
Canvas Sleeve	Incase	13	12	49	Our Coated Canvas Sleeve offers complete notebook protection in a clean, simple design. Constructed of heavy-duty cotton canvas, the Sleeve is finished with a weather resistant coating for added durability and a refined look and feel.	9
Neoprene	Belkin	13	10	7	Whether you're traveling to the cafe or across the country, this light and durable sleeve protects your mini laptop from minor scratches en route. Stow it inside your own bag or one of Belkin's stylish laptop bags.	5
Messenger Bag	Belkin	10-12	11	20	Belkin's Messenger Bag brings you the comfort of a lightweight case with the features and capacity of a much larger model. This case provides a plush Netbook compartment for secure mobility.	6
Slim Carry	Belkin	13	5	22	This slender case is designed specifically to protect your device without the bulk. Carry your laptop using the grip handles, or as a shoulder bag with detachable strap. Featuring an easy-access outside pocket and an inside organizational compartment, this is the perfect compact carrying solution.	7
Protective Sleeve	Incase	15	10	63	As a cutting-edge visual artist, Andy Warhol understood and embraced technology and saw it as the future of contemporary culture and the arts. The Warhol edition Protective Sleeve features some of the artist’s most beloved works along with the same complete notebook protection, weather resistant coating, and elegant design of our standard Protective Sleeve.	8
\.


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: jwankutk
--

COPY orders (id_product, id_customers, quantity, total, cardnum, type, "time") FROM stdin;
1	1	15	13650	12yJ.Of/NQ.Pk	laptop	1307610844
13	2	1	300	56a/NpXpEac4I	laptop	1307829282
42	3	1	899	34ti2ImuW7BF2	laptop	1308062661
19	3	1	379	34ti2ImuW7BF2	laptop	1308062661
\.


--
-- Data for Name: printer; Type: TABLE DATA; Schema: public; Owner: jwankutk
--

COPY printer (model, brand, type, quantity, price, description, id) FROM stdin;
PIXMA MP499	Canon	Jet Ink	6	69	Wi-Fi Connection\nESAT ISO 8,8/5,0 ipm (black and white/color)\nFull HD Movie Print\nPhotos 10 x 15 cm in 41 seconds\nQuality about 4 800 dpi, 2 pl\nEasy-WebPrint EX\nChromaLife100+\nDesign black, compact and elegant	2
PIXMA MP250	Canon	Jet Ink	7	37	Hi-Speed USB, 100 sheets, Impression : until 7 ppm (mono)/until 4.8 ppm (color), 4 800 x 1 200 ppp (color), 44.4 cm x 33.1 cm x 15.5 cm	3
CLX-6250FX	Samsung	Jet Ink	8	949	Hi-Speed USB, Ethernet 10 Base-T/100 Base-TX, Fax : 33.6 Kbits/s, 350 sheets, Impression : until 24 ppm (mono)/until 24 ppm (color), 46.8 cm x 49.8 cm x 65.1 cm	4
STYLUS SX218	Epson	Laser	7	89	Enjoy the user-friendly, all-in-one with memory card slots that make photo viewing and printing easy. The 3.8cm colour LCD viewer is ideal for pre-selecting your photos before printing them to lab-quality standard from the comfort of your home.	6
STYLUS PHOTO PX660	Epson	Jet Ink	3	151	This all-in-one's smart-navigation touch-panel with LCD screen puts you firmly in control of scan, copy and print functions. Produce photos that look better and last longer than those from photo labs, with 10x15cm prints taking just 12 seconds.	7
STYLUS SX620FW	Epson	Jet Ink	3	180	Enjoy the multiple benefits of our modern, wireless 4-in-1 printer. The whole household can print, scan, copy and fax from anywhere in the home, minus the unsightly wires and cables. Our fast, feature-rich device also includes an automatic document feeder, front-loading paper tray, plus a 6.3cm LCD viewer so you can select and print photos direct from memory cards, PictBridge or a USB key.	8
Officejet H470	HP	Laser	4	249	Print anytime, anywhere, from a variety of devices, with this high-performance mobile printer. Enjoy the freedom of a portable printer with compact size, Wireless 802.11b/g adapter, Bluetooth adapter and long-life battery.	10
SCX-4623FNW	Samsung	Monochrom	5	210	In addition to its radical simplicity, the HP LaserJet P2055 Printer series also enables high productivity through fast speeds, easy supplies and device manageability, and automatic two-sided printing. Safeguard your business with security capabilities that help protect devices and critical information on your network. Prevent unauthorized access with management features like 802.1X authentication and password protection.	12
PIXMA MG8150	Canon	Jet Ink	5	264	Hi-Speed USB, Ethernet 10 Base-T/100 Base-TX, IEEE 802.11b, IEEE 802.11g, IEEE 802.11n,  USB cable, 300 sheets, Impression : Until 12.5 ipm (mono)/until 9.3 ipm (color), 9600 x 2400 ppp (color), 47 cm x 39.2 cm x 19.9 cm	1
ML-1675	Samsung	Jet Ink	5	91	Hi-Speed USB, Ethernet 10 Base-T/100 Base-TX, Fax : 33.6 Kbits/s, 350 sheets, Impression : until 24 ppm (mono)/until 24 ppm (color), 46.8 cm x 49.8 cm x 65.1 cm	5
M1212nf	HP	Laser	4	199	Time saving efficiency\nSet up fast, without a CD, using HP Smart Install for Windows and a USB print cable2\nSkip the wait: the first page prints in less than 8.5 seconds\nPrint fast with our Instant-on Technology\nIntervene less often with the 35-sheet automatic document feeder Simplify maintenance with the up to 8,000-page-per-month duty cycle and 1,600-page, single-piece cartridge\nConnect your small work group using built-in Ethernet networking or plug directly into a PC using the high Hi-Speed USB port\nFax fast, at up to 33.6 Kbps	9
Officejet 6000	HP	Jet Ink	3	99	Get professional-looking documents for the lowest cost per page vs. in-class inkjets, and do it using up to 40% less energy than with lasers. You can also use your new Officejet 6000 with high-capacity ink cartridges3 for fewer interruptions.	11
\.


--
-- Data for Name: usb; Type: TABLE DATA; Schema: public; Owner: jwankutk
--

COPY usb (model, brand, quantity, capacity, price, description, id) FROM stdin;
Cruzer Blade	Sandisk	30	4	18	Take your favorite files with you on the small and very portable SanDisk Cruzer Blade USB flash drive. Sleek in style and great in value, just pop your pictures, tunes or other fun files onto the SanDisk Cruzer Blade USB flash drive and start sharing with your family and friends the small, swift way.	1
Ultra Backup	Sandisk	12	8	20	Protect your favorite photos, videos, music and other digital files with this USB flash drive. Easily launch the onboard backup application with the touch of a button no cables or software installation required. AES hardware-based encryption and password-protected access control keep your data private and secure. Small size fits nicely in your pocket. Connector Port Interface: USB Storage Capacity: 16 GB Writing Speed: N A Reading Speed: N A Dimensions: 0.5 in x 7 in x 5 inWeight: 0.01 lbs.	3
Flash Voyager	Corsair	12	4	18	The Corsair Flash Voyager family of USB drives is rugged, stylish, compact, and reliable, making them ideal for transporting MP3s, digital images, presentations and more. Flash Voyager drives are fully Plug and Play with most operating systems and are backward compatible with USB 1.1. Their durable rubber casing is easy to grip and water resistant. The Flash Voyager product line is both enclosed in the Corsair proprietary all-rubber Flash Voyager housing. Boasting water-resistant properties, these drives allow users to carry more valuable data and applications without compromise. Several reviews of the Flash Voyager products have demonstrated the ruggedness, durability, and reliability of the Flash Voyager family. The Flash Voyager has been shown laundered, baked, frozen, boiled, dropped, and even run over by a SUV in many third party reviews. After all the punishment it receives, the drive continues to work	5
Flash Survivor	Corsair	11	4	25	Flash Survivor is an extremely durable, water resistant, drop-tested flash USB memory drive. By design it is perfect for transporting valuable data such as personal files, photos and applications without having to worry about damage or loss of data due to the elements.	7
DTR500	Kingston	18	16	29	Kingston's DataTraveler R500 provides rugged portable storage in capacities that let you take all your data with you to the office, school, travel and more. Its durable, rubberized casing makes it easy to grip and protects the drive from scratches and general wear, so it's ideal for road warriors and outdoor adventurers alike. DataTraveler R500 provides high speeds read and write and is easy to use. Its blazing fast speed means you can quickly back up all your documents, even the largest video files, plus travel photos, music and more.	8
Data Traveler mini	Kingston	14	8	22	DataTraveler Mini Fun G2 features a mini design in cool, fun color, making it ideal for home, school and travel. It's perfect for your important documents, music, video clips and favorite photos that can be stored and retrieved in a flash. This fashionable accessory features rugged silicon rubber housing.	9
G3	Kingston	18	4	9	The reliable DataTraveler Generation 3 (G3) is ideal for your important documents, music, video clips and favorite photos that can be stored and retrieved in a flash. It's a perfect fit for the office, home, school and wherever you travel. A well-built cap protects the USB plug and your data. DataTraveler G3 also makes a great promotional item for your organization, it's simple to add your logo to increase brand recognition.	10
Data Traveler	Kingston	16	16	28	Sleek, practical and attractively designed, the affordable DataTraveler 101 G2 serves the needs of the budget-conscious users as well as those looking for significant storage capacity in a lightweight, compact drive. It features a capless, swivel design for added functionality and ease of use and is available in five fun colors by capacity. Ideal for anyone on the go, with urDrive is like having a customizable, portable desktop - anywhere	11
Cruzer Edge	Sandisk	20	16	25	Store all your data, music, video, or photo files with the compact and stylish SanDisk Cruzer Edge USB flash drive that keeps all your files safe from prying eyes. This flash drive's simple, yet sleek slider design means no cap to lose, which makes it the perfect portable device for taking your favorite files with you anywhere on the go.	2
Flash Padlock	Corsair	13	32	43	The Corsair Flash Padlock 2 is perfect for transporting and protecting your sensitive business or personal information. With built-in 256-bit hardware data encryption, and access limited by a PIN, you can rest assured your information is safe from unintentional viewing. Built with the same ruggedized rubber housing found on the Corsair Flash Voyager family for durability, your data is protected from the elements as well	6
Cruzer flash	Sandisk	6	8	40	Experience reliable, portable storage with a SanDisk Cruzer USB Flash Drive. Why leave your photos, videos and music at home when they'll fit in your pocket? Trust the minds behind flash memory to make it easy to store, transfer and share your digital files wherever you go. With up to 32GB of storage, these drives are built to handle the real world's bumps and turns-so you can count on them to help you share plenty of pix, flix and other digital favorites wherever you go.	4
\.


--
-- PostgreSQL database dump complete
--

